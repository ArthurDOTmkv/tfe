<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Commande;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Redirection vers la page de concerts si tentative d'accéder à /paiement alors que le panier est vide
        if(Cart::count() <= 0)
        {
            return redirect()->route('concerts.index');
        }
        Stripe::setApiKey('sk_test_51IbU2DFyQMpZqbpyg7owK5RggOzsKuLK4ixxyD1pz1BpajU26hz5PQtbN5oiUKjiuPVmipDDcxh0X38AdyJOf7tz000JxPbITq');
        
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'eur',
            //'payment_method_types' => ['card'],
          ]);
        
        //Faire passer la clé secrète à une variable pour pouvoir l'utiliser dans le front
        $clientSecret = Arr::get($intent, "client_secret");
        
        return view('paiement.index', [
            "clientSecret" => $clientSecret
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Récupération de l'objet de paiement dans la variable $data
        $data = $request->json()->all();
        
        //Stocker les données de paymentIntent dans le champ paymentIntentId de la Commande
        $commande = new Commande();
        $commande->paymentIntentId = $data['paymentIntent']['id'];
        $commande->montant = $data['paymentIntent']['amount'];
        $commande->paymentCreatedAt = (new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('d-m-Y H:i');
        
        $concerts = [];
        $i = 0;
        foreach(Cart::content() as $concert)
        {
            $concerts['concert_' . $i][] = $concert->model->titre;
            $concerts['concert_' . $i][] = $concert->model->prix;
            $concerts['concert_' . $i][] = $concert->qty;
            $i++;
        }
        
        $commande->concerts = serialize($concerts);
        $commande->user_id = 1;
        
        $commande->save();
        
        if($data['paymentIntent']['status'] === 'success')
        {
            Cart::destroy();
            Sessio::flash('success', 'Commande validé avec succès');
            return response()->json(['success' => 'Enregistrement validé']);
        }
        else
        {
            return response()->json(['failed' => 'Enregistrement échoué']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function paiementreussi()
    {
        return Session::has('succes') ? view('paiement.paiementreussi') : redirect()->route('concerts.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

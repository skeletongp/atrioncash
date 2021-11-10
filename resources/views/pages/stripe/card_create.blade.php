@extends('dashboard')

@section('body')
    <div class="max-w-6xl mx-auto my-32">
        <!-- component -->
        <h1 class="text-center font-bold text-xl lg:text-2xl uppercase my-2">Añade un nuevo método de pago</h1>
        <div
            class="py-16  rounded-xl  max-w-sm h-full border border-black flex flex-col px-8 space-y-6 mx-auto text-center relative">

            <div id="card-element">
            </div>
            <x-input id="card-holder-name" placeholder="Nombre de la tarjeta" type="text"></x-input>

            <div class="mb-4">
                <x-button class="bg-black text-white" id="card-button" data-secret="{{ $intent->client_secret }}">
                    Guardar Método de Pago
                </x-button>
            </div>
            <small class="text-red-500 hidden" id="error">Revise los datos e intente de nuevo</small>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe(
            'pk_test_51JQu4tBsgIAd3bdJvKPRqaZKUZGrEIbyeI4VGM7c5mdgu4qtVOaQxqFpYnY1mZ4PWJRqsfnUsmdfbQB5x2b5W2UW00e7HGa6fE'
        );

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            if (error) {
                $('#error').show();
            } else {
                $.post({
                    url: '/plans/card_save',
                    data: {
                        card: setupIntent['payment_method'],
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status === "success") {
                            location.href="/plans"
                        } else if (response.status === "error") {
                            console.log(error)
                        }
                    }
                })
            }
        });
    </script>
@endsection

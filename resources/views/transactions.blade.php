<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center">
        <button class="inline-flex items-center px-4 py-2 bg-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Registrar Receita
        </button>
        <button class="ml-3 inline-flex items-center px-4 py-2 bg-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Registrar Despesa
        </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="container bg-black text-white mt-3 rounded-lg shadow-01">

                <div class="pt-3 pb-3">
                    <h5 class="text-center text-xl bg-secondary p-2 rounded bold">Transações</h5>
                </div>
                
                @foreach($transactions as $transaction)
                <div class="row"> 
                    <h5 class="pt-1 text-center ">{{ $transaction->formatted_date }}</h5>
                    <hr class="mx-auto text-center " style="width: 50%;">
                </div>

                <div class="row">
                    <div class="col-1 text-center">
                    @if($transaction instanceof App\Models\Revenue)
                        <i class="bi bi-basket2-fill circle p-2 text-xl {{ ($transaction->RevenueCategory)->color }}"></i> 
                    @elseif($transaction instanceof App\Models\Expense)
                        <i class="bi bi-basket2-fill circle p-2 text-xl {{ ($transaction->ExpenseCategory)->color }}"></i>
                    @endif      
                    </div>

                    <div class="col">
                        <h6>{{ $transaction->description }}</h6>
                        <span id="category" class="text-secondary">
                        @if($transaction instanceof App\Models\Revenue)
                            {{ ($transaction->RevenueCategory)->category }}
                        @elseif($transaction instanceof App\Models\Expense)
                            {{ ($transaction->ExpenseCategory)->category }}
                        @endif
                        </span>
                    </div>

                    <div class="col text-start bold {{ $transaction instanceof App\Models\Revenue ? 'text-success' : 'text-danger' }}">
                        <h6>{{ $transaction->formatted_value }}</h6>
                    </div>

                    <div class="col-2 px-3 text-center">
                        <h6 class="{{ $transaction->pending == 1 ? 'bg-success' : 'bg-danger' }} p-1 rounded-lg w-22">
                            {{ $transaction->pending == 1 ? 'Efetivada' : 'Pendente' }}
                        </h6>
                    </div>

                    <div class="col-2 px-3 text-center text-black">
                    @if($transaction->pending != 0)
                        <h6 class="bg-warning p-1 rounded-lg w-20">Fixa</h6>
                    @endif
                    </div>

                    <div class="col text-center">
                        <button type="submit" class="px-4 py-2 bg-DodgerBlue border rounded-md font-semibold text-xs text-white hover:bg-Navy active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button type="submit" class="ml-2 px-4 py-2 bg-Red border rounded-md font-semibold text-xs text-white hover:bg-DarkRed active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>

                    <hr class="mx-auto text-center pb-1" style="width: 100%;">
                </div>
            @endforeach

            <hr>

            </div>
        </div>     
    </div>
</x-app-layout>
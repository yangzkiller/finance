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
                    <div class="d-flex justify-content-between align-items-center">
                        <i id="prevTransaction" class="bi bi-chevron-left text-white p-2 ml-4"></i>

                        <h5 id="transactionsTitle" class="text-center text-xl p-1 rounded bold bg-secondary" style="width: 86%;">Transações</h5>

                        <i id="nextTransaction" class="bi bi-chevron-right text-white p-2 mr-4"></i>
                    </div>
                </div>

                <div id="transactionsContainer">
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
                        @if($transaction->fixed != 0)
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
                </div>

                <div id="revenuesContainer">
                    @foreach($revenues as $revenue)
                    <div class="row"> 
                        <h5 class="pt-1 text-center ">{{ $revenue->formatted_date }}</h5>
                        <hr class="mx-auto text-center " style="width: 50%;">
                    </div>

                    <div class="row">
                        <div class="col-1 text-center">
                            <i class="bi bi-basket2-fill circle p-2 text-xl {{ ($revenue->RevenueCategory)->color }}"></i> 
                        </div>

                        <div class="col">
                            <h6>{{ $revenue->description }}</h6>
                            <span id="category" class="text-secondary">
                                {{ ($revenue->RevenueCategory)->category }}
                            </span>
                        </div>

                        <div class="col text-start bold {{ $revenue instanceof App\Models\Revenue ? 'text-success' : 'text-danger' }}">
                            <h6>{{ $revenue->formatted_value }}</h6>
                        </div>

                        <div class="col-2 px-3 text-center">
                            <h6 class="{{ $revenue->pending == 1 ? 'bg-success' : 'bg-danger' }} p-1 rounded-lg w-22">
                                {{ $revenue->pending == 1 ? 'Efetivada' : 'Pendente' }}
                            </h6>
                        </div>

                        <div class="col-2 px-3 text-center text-black">
                        @if($revenue->fixed != 0)
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
                </div>

                <div id="expensesContainer">
                    @foreach($expenses as $expense)
                    <div class="row"> 
                        <h5 class="pt-1 text-center ">{{ $expense->formatted_date }}</h5>
                        <hr class="mx-auto text-center " style="width: 50%;">
                    </div>

                    <div class="row">
                        <div class="col-1 text-center">
                            <i class="bi bi-basket2-fill circle p-2 text-xl {{ ($transaction->ExpenseCategory)->color }}"></i>
                        </div>

                        <div class="col">
                            <h6>{{ $expense->description }}</h6>
                            <span id="category" class="text-secondary">
                                {{ ($expense->ExpenseCategory)->category }}
                            </span>
                        </div>

                        <div class="col text-start bold {{ $expense instanceof App\Models\Expense ? 'text-danger' : 'text-success' }}">
                            <h6>{{ $expense->formatted_value }}</h6>
                        </div>

                        <div class="col-2 px-3 text-center">
                            <h6 class="{{ $expense->pending == 1 ? 'bg-success' : 'bg-danger' }} p-1 rounded-lg w-22">
                                {{ $expense->pending == 1 ? 'Efetivada' : 'Pendente' }}
                            </h6>
                        </div>

                        <div class="col-2 px-3 text-center text-black">
                        @if($expense->fixed != 0)
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
                </div>
            </div>
        </div>     
    </div>
</x-app-layout>

<!-- Script - De alternação das views através das setas -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var transactionsTitle = document.getElementById("transactionsTitle");
        var transactionsContainer = document.getElementById("transactionsContainer");
        var revenuesContainer = document.getElementById("revenuesContainer");
        var expensesContainer = document.getElementById("expensesContainer");
        var currentView = "all"; 

        function showContainer(container) {
            transactionsContainer.style.display = "none";
            revenuesContainer.style.display = "none";
            expensesContainer.style.display = "none";

            container.style.display = "block";
        }

        // Exibe transactionsContainer quando a página carrega
        showContainer(transactionsContainer);

        document.getElementById("prevTransaction").addEventListener("click", function () {
            switch (currentView) {
                case "revenues":
                    transactionsTitle.textContent = "Transações";
                    transactionsTitle.classList.remove("bg-success", "bg-danger");
                    transactionsTitle.classList.add("bg-secondary");
                    currentView = "all";
                    showContainer(transactionsContainer);
                    break;
                case "expenses":
                    transactionsTitle.textContent = "Receitas";
                    transactionsTitle.classList.remove("bg-danger");
                    transactionsTitle.classList.add("bg-success");
                    currentView = "revenues";
                    showContainer(revenuesContainer);
                    break;
                case "all":
                default:
                    transactionsTitle.textContent = "Despesas";
                    transactionsTitle.classList.remove("bg-success");
                    transactionsTitle.classList.add("bg-danger");
                    currentView = "expenses";
                    showContainer(expensesContainer);
            }
        });

        document.getElementById("nextTransaction").addEventListener("click", function () {
            switch (currentView) {
                case "revenues":
                    transactionsTitle.textContent = "Despesas";
                    transactionsTitle.classList.remove("bg-success");
                    transactionsTitle.classList.add("bg-danger");
                    currentView = "expenses";
                    showContainer(expensesContainer);
                    break;
                case "expenses":
                    transactionsTitle.textContent = "Transações";
                    transactionsTitle.classList.remove("bg-success", "bg-danger");
                    transactionsTitle.classList.add("bg-secondary");
                    currentView = "all";
                    showContainer(transactionsContainer);
                    break;
                case "all":
                default:
                    transactionsTitle.textContent = "Receitas";
                    transactionsTitle.classList.remove("bg-danger");
                    transactionsTitle.classList.add("bg-success");
                    currentView = "revenues";
                    showContainer(revenuesContainer);
            }
        });
    });
</script>



<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-center rounded-5 bg-black p-2 shadow-01" style="width: 30%;">
                <a href="#" id="previousMonth" class="mr-3">
                    <i class="bi bi-caret-left-fill arrow-icon"></i>
                </a>

                <h3 class="text-white" id="currentMonth" style="font-weight: bold;">{{ $months[$selectedMonth - 1] }} - {{ $selectedYear }}</h3>

                <a href="#" id="nextMonth" class="ml-3">
                    <i class="bi bi-caret-right-fill arrow-icon"></i>
                </a>
            </div>

            <!-- Filter date -->
            <script>
                document.getElementById('previousMonth').addEventListener('click', function(e) 
                {
                    e.preventDefault();
                    let monthValue = {{ $selectedMonth }};
                    let yearValue = {{ $selectedYear }};
                    
                    if (monthValue === 1) 
                    {
                        monthValue = 12;
                        yearValue -= 1;
                    } 
                    else 
                    {
                        monthValue -= 1;
                    }

                    window.location.href = "{{ route('transactions_index') }}?year=" + yearValue + "&month=" + monthValue;
                });

                document.getElementById('nextMonth').addEventListener('click', function(e) {
                    e.preventDefault();
                    let monthValue = {{ $selectedMonth }};
                    let yearValue = {{ $selectedYear }};
                    
                    if (monthValue === 12) 
                    {
                        monthValue = 1;
                        yearValue += 1;
                    } 
                    else 
                    {
                        monthValue += 1;
                    }

                    window.location.href = "{{ route('transactions_index') }}?year=" + yearValue + "&month=" + monthValue;
                });
            </script>

          <!--  <button class="inline-flex items-center px-4 py-2 bg-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Registrar Receita
            </button>

            <button class="ml-3 inline-flex items-center px-4 py-2 bg-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Registrar Despesa
            </button>-->
        </div>
    </x-slot>










<table class="text-white" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


</x-app-layout>




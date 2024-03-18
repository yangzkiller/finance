<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Método para exibir as transações na página de transações.
     * 
     * @param Request $request A requisição HTTP
     * @return \Illuminate\Contracts\View\View A view com os dados das transações
     */
    public function index(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->format('Y'));
        $selectedMonth = $request->input('month', Carbon::now()->format('m'));
        
        $years = Revenue::selectRaw('YEAR(date) as year')->distinct()->pluck('year');
        $months = collect([
            'JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL', 'MAIO', 'JUNHO',
            'JULHO', 'AGOSTO', 'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO'
        ]);
    
        // Calcular os valores para navegação entre meses
        $previousMonth = $selectedMonth == 1 ? 12 : $selectedMonth - 1;
        $previousYear = $selectedMonth == 1 ? $selectedYear - 1 : $selectedYear;
        $nextMonth = $selectedMonth == 12 ? 1 : $selectedMonth + 1;
        $nextYear = $selectedMonth == 12 ? $selectedYear + 1 : $selectedYear;
    
        $revenues = Revenue::select('id', 'date', 'description')
            ->whereYear('date', $selectedYear)
            ->whereMonth('date', $selectedMonth)
            ->get();

        $expenses = Expense::select('id', 'date', 'description')
            ->whereYear('date', $selectedYear)
            ->whereMonth('date', $selectedMonth)
            ->get();
        
        $transactions = $revenues->concat($expenses)->sortByDesc('date');
        
        return view('transactions', compact('transactions', 'years', 'months', 'selectedYear', 'selectedMonth', 'previousYear', 'previousMonth', 'nextYear', 'nextMonth'));
    }
}

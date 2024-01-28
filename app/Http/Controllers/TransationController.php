<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Revenue;

use Carbon\Carbon;

class TransationController extends Controller
{
    public function index()
    {
        Carbon::setLocale('pt_BR');

        $revenues = Revenue::all();
        $expenses = Expense::all();

        $transactions = $revenues->concat($expenses)->sortBy('date');

        // Formatando datas para exibir como "Domingo, 14"
        $formattedTransactions = $this->formatDates($transactions);
        $formattedRevenues = $this->formatDates($revenues);
        $formattedExpenses = $this->formatDates($expenses);

        return view('transactions', [
            'transactions' => $formattedTransactions, 
            'revenues' => $formattedRevenues, 
            'expenses' => $formattedExpenses
        ]);
    }
    
    private function formatDates($data) 
    {
        foreach ($data as $item) 
        {
            $formattedDate = Carbon::parse($item->date)->translatedFormat('l, d');
            $item->formatted_date = ucfirst($formattedDate); // Capitaliza a primeira letra

            $formattedValue = 'R$ ' . number_format($item->value, 2, ',', '.'); // Formata o valor para R$ 0.000,00
            $item->formatted_value = $formattedValue;
        }
        return $data;
    
    }
}

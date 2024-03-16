<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Revenue;

use Illuminate\Http\Request;

use Carbon\Carbon;

class TransationController extends Controller
{
    public function index2()
    {
        Carbon::setLocale('pt_BR');

        $revenues = Revenue::all();
        $expenses = Expense::all();

        $transactions = $revenues->concat($expenses)->sortByDesc('date');


        // Formatando datas para exibir como "Domingo, 14"
        //$formattedTransactions = $this->formatDates($transactions);
        //$formattedRevenues = $this->formatDates($revenues);
        //$formattedExpenses = $this->formatDates($expenses);

        return view('transactions', [
            'transactions' => $transactions, 
            'revenues' => $revenues, 
            'expenses' => $expenses
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



    public function index()
    {
        // Defina o mês inicial aqui ou ajuste conforme necessário
        $currentMonth = 1;

        // Adicione lógica para obter transações (este exemplo usa o mesmo código que em getTransactionsByMonth)
        $revenues = Revenue::whereMonth('date', '=', $currentMonth)->get();
        $expenses = Expense::whereMonth('date', '=', $currentMonth)->get();

        $transactions = $revenues->concat($expenses);

        return view('transactions', ['currentMonth' => $currentMonth, 'transactions' => $transactions]);
    }

    public function getTransactionsByMonth($numeroDoMes)
    {
        // Adicione lógica para obter transações com base no número do mês
        $revenues = Revenue::whereMonth('date', '=', $numeroDoMes)->get();
        $expenses = Expense::whereMonth('date', '=', $numeroDoMes)->get();
    
        $transactions = $revenues->concat($expenses);
    
        // Retorne os dados para o frontend
        return response()->json(['transactions' => $transactions]);
    }
    



}

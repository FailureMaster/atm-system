<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ATMController extends Controller
{
    public function pinEntry()
    {
        return view('atm.pin');
    }

    // Handle the PIN verification
    public function enterPin(Request $request)
    {
        $user = User::where('name', $request->name)->first();
    
        // Check if the user exists
        if (!$user) {
            return back()->withErrors(['message' => 'Invalid username or PIN.']);
        }
    
        // Check if the account is locked
        if ($user->is_locked) {
            return back()->withErrors(['message' => 'Your account is locked due to too many failed attempts.']);
        }
    
        // Check if the PIN is correct
        if (!Hash::check($request->pin, $user->pin)) {
            $user->failed_attempts += 1;
    
            // Lock the account after 3 failed attempts
            if ($user->failed_attempts >= 3) {
                $user->is_locked = true;
            }
    
            $user->save();
    
            return back()->withErrors(['message' => 'Invalid PIN.']);
        }
    
        // Reset failed attempts if the PIN is correct
        $user->failed_attempts = 0;
        $user->save();
    
        // Log the user in
        Auth::login($user);
    
        // Redirect to the ATM menu
        return redirect()->route('atm.menu');
    }

    
    // Show the ATM main menu
    public function menu(){
        return view('atm.menu');
    }

    public function checkBalance(){
        $user = auth()->user(); // Get the currently authenticated user
        return view('atm.balance', ['balance' => $user->balance]); // Pass the balance to the view
    }

        // Show the deposit form
    public function depositForm()
    {
        return view('atm.deposit');
    }

    // Process the deposit
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);
    
        $user = auth()->user();
        $amount = $request->input('amount');
    
        // Update balance and record the transaction
        $user->balance += $amount;
        $user->save();
        $user->transactions()->create(['type' => 'deposit', 'amount' => $amount]);
    
        // Pass a session flash variable for SweetAlert2
        return redirect()->route('atm.menu')->with('success', 'Deposit of $' . number_format($amount, 2) . ' was successful.');
    }
    

    // Show the withdrawal form
    public function withdrawForm()
    {
        return view('atm.withdraw');
    }

    // Process the withdrawal
    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);
    
        $user = auth()->user();
        $amount = $request->input('amount');
    
        if ($amount > $user->balance) {
            return back()->withErrors(['message' => 'Insufficient funds.']);
        }
    
        // Update balance and record the transaction
        $user->balance -= $amount;
        $user->save();
        $user->transactions()->create(['type' => 'withdrawal', 'amount' => $amount]);
    
        // Pass a session flash variable for SweetAlert2
        return redirect()->route('atm.menu')->with('success', 'Withdrawal of $' . number_format($amount, 2) . ' was successful.');
    }
    

    public function transactionHistory()
    {
        $user = auth()->user(); // Get the authenticated user
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get(); // Fetch transactions in descending order
        return view('atm.history', ['transactions' => $transactions]); // Pass transactions to the view
    }

    public function logout(Request $request){
        Auth::logout(); // Log out the authenticated user
    
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token to prevent session fixation attacks
    
        return redirect()->route('atm.pinEntry')->with('success', 'You have been logged out.');
    }
    
    


}

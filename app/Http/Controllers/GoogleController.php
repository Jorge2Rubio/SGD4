use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    $googleUser = Socialite::driver('google')->user();

    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        ['name' => $googleUser->getName(), 'password' => bcrypt(Str::random(24))]
    );

    Auth::login($user);

    return redirect('/admin');
}

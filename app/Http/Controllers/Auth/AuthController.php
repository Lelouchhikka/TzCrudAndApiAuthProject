<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use App\Models\User;

use Illuminate\Support\Facades\Hash;



class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        return view('auth.login');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function registration()

    {

        return view('auth.registration');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {

        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);



        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            dd(Auth::user()->createToken('MyApp')-> accessToken);
            return redirect()->route('home')
                ->withSuccess('You have Successfully loggedin');
        }



        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',

        ]);



        $data = $request->all();

        $check = $this->create($data);



        return redirect()->route('home')->withSuccess('Great! You have Successfully loggedin');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */





    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {

        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => Hash::make($data['password'])

        ]);

    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();

        Auth::logout();



        return Redirect('login');

    }

}

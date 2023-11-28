
## Assignments on Form validation rules 
In Laravel, we can use Form Request Validation to validate incoming HTTP request data before it reaches your controllers. This is a good practice for keeping our code clean and organized.
Here's a step-by-step guide with an example of how to perform request validation with a separate Form Request class for a login and registration system.

1. **Create a Form Request Class**:
   First, create a form request class for our registration and login forms. we can use the `make:request` Artisan command to generate these classes:

   For Registration:
   ```
   php artisan make:request RegistrationRequest
   ```
   For Login:
   ```
   php artisan make:request LoginRequest
   ```
This will generate two files in the `app/Http/Requests` directory: `RegistrationRequest.php` and `LoginRequest.php`.

2. **Define Validation Rules**:
Open the `RegistrationRequest.php` file and define the validation rules in the `rules` method. Here's an example of how to set up validation rules for a registration form:
```
public function rules()
{
return [
    'name' => 'required|string|max:50',
    "username" => "required|string|max:50",
    'email' => 'required|string|email|unique:users,email',
    'password' => 'required|string|min:8',
    ];
}
```
Open the `LoginRequest.php` file and define the validation rules for the login form:
```
public function rules()
{
    return [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ];
}
```
**Routes for this validations
```
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
```
3. **Use the Form Request in our Controllers**:
In our registration and login controllers, we can type-hint the form request class in the method. Laravel will automatically validate the incoming data using the defined rules.
Registration Controller Example:
```
use App\Http\Requests\RegistrationRequest;

public function register(RegistrationRequest $request)
   {
        // dd($request);
        // $data = $request->all();
        // dd($data);
        // $validated = $request->validated();
        // dd($validated);
 // Registration logic here
 // Validation has passed; you can now create a new user
      $validated = $request->validated();

        DB::table('users')->insert([
            'name' => $validated['name'],
             'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
    return redirect('/dashboard'); // Redirect to the dashboard or any other page
   }
```
Login Controller Example:
```
   use App\Http\Requests\LoginRequest;

   public function login(LoginRequest $request)
   {
        // Validation has passed; we can now attempt to log the user in
    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        // Authentication passed, the user is logged in
        return redirect('/dashboard'); // Redirect to the dashboard or any other page
    }

    // Authentication failed
    return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
   }
```

4. **Handle Validation Errors**:
If the request data doesn't pass validation, Laravel will automatically redirect back to the form with the validation errors. we can display these errors in your Blade views using the `@error` and `@enderror` directives. For example:

```
<input type="text" name="name" value="{{ old('name') }}">
  @error('name')
       <p class="text-red-500">{{ $message }}</p>
  @enderror
```

5. **Customizing Error Messages**:
We can customize error messages in the form request class by defining the `messages` method. For example:

 ```
 public function messages()
   {
       return [
           'name.required' => 'The name field is required.',
           'email.unique' => 'This email address is already in use.',
       ];
   }
 ```
**Custom Validator
```
use use Illuminate\Support\Facades\Validator;

public function register(Request $request)
{
$validator = Validator::make($request->all(), [
    'name' => 'required|string|max:50',
    "username" => "required|string|max:50",
    'email' => 'required|string|email|unique:users,email',
    'password' => 'required|string|min:8',
])->validate(); //it will redirect to the registration form page if validation fails.

or 
    if ($validator->fails()) {
    return redirect()->route('register')->withErrors($validator)->withInput();
    } //it will  redirect to the register routes or desired routes with inputs if validation fails.

    $validated = $validator->validated();
    dd($validated);
or
    $validated = $validator->safe()->only("name", "email"); //if we want two input fields
    dd($validated);
or
    $validated = $validator->safe()->except("username");// if we want all other fields except any input field  
    dd($validated);
}
```
6. **Optional: Authorize Method**:
we can define an `authorize` method in your form request classes to determine if the user is authorized to perform the action. This is useful for policies and gates, but it's optional for simple form validation.

Now, your registration and login forms will be validated using the Form Request classes, keeping your controller code clean and organized.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

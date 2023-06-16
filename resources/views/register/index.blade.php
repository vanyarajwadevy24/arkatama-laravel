<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        
        <link href="{{ asset ('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <div class="row justify-content-center pt-5">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 style="font-family:Comic Sans MS" class="h4 mb-3 fw-normal text-center">Register</h1>
                <form action="/register" method="post">
                  @csrf
                    <div style="font-family:Century Schoolbook" class="form-floating">
                        <input type="text" name='name' class="form-control rounded-top @error('name') is-invalid" @enderror id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div style="font-family:Century Schoolbook"  class="form-floating">
                      <input type="email" name='email' class="form-control @error('email') is-invalid" @enderror id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                      <label for="email">Email address</label>
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div> 
                      @enderror
                    </div>
    
                    <div style="font-family:Century Schoolbook" class="form-group mb-2">
                        <label for="role">Role</label>
                        <select name="role_id" id="role_id">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                        @error('role') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                    
                  <div style="font-family:Century Schoolbook" class="form-floating">
                    <input type="password" name='password' class="form-control rounded-bottom @error('password') is-invalid" @enderror  id="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div> 
                    @enderror
                  </div>
                  <button style="font-family:Century Schoolbook" class="w-100 btn btn-lg btn-danger mt-3" type="submit">Register</button>
                </form>
                <small style="font-family:Century Schoolbook" class="d-block text-center">
                    Already registered? <a href="/login">Login</a>
                </small>
              </main>
        </div>
    </div>
    

        </div>
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset ('js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
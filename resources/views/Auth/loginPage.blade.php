<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script src="https://kit.fontawesome.com/bdd89edb33.js"></script>
  <link rel="stylesheet" href="css/style.css" />
  <title>Login Form</title>
  <style>
    * {
  padding: 0;
  margin: 0;
}

body {
  height: 100vh;
  font-family: sans-serif;
  background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)),
    url(https://images.pexels.com/photos/2763927/pexels-photo-2763927.jpeg?cs=srgb&dl=4k-wallpaper-blur-close-up-2763927.jpg&fm=jpg);
  background-size: cover;
  background-position: center;
  color: #fff;
}

.container {
  height: 100vh;
  width: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.login {
  padding: 4rem 8rem;
  background: linear-gradient(
    to bottom right,
    rgb(20 20 24),
    rgb(0 0 0)
  );
  border-radius: 25px;
  opacity: 0.9;
  box-shadow: 5px 5px 15px #00ffff, -5px -5px 15px #00ffff;
}

.login h1 {
  font-size: 40px;
  margin-bottom: 2rem;
  padding: 5px 0;
  text-shadow: 1px 1px 2px rgb(0, 255, 255), 0 0 1em rgb(0, 255, 255),
    0 0 0.2em rgb(0, 255, 255);
}

.username,
.password {
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 2px solid #00ffff;
}

.username input,
.password input {
  border: none;
  outline: none;
  background: none;
  color: #fff;
  font-size: 18px;
  width: 80%;
  margin: 0 10px;
}

.username input::placeholder,
.password input::placeholder {
  color: #fff;
}

.btn {
  width: 100%;
  background: none;
  border: 2px solid #00ffff;
  color: #fff;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}

@media (max-width: 425px) {
  .login {
    padding: 8rem 2rem;
  }
}
@media (max-width: 375px) {
  .login {
    padding: 8rem 1rem;
  }
}

@media (max-width: 320px) {
  .login {
    padding: 8rem 1rem;
    width: 70%;
  }
}

  </style>
</head>

<body>
  <div class="container">
    <div class="login">
      <h1>Login</h1>
      <form action="{{route('logInCheck')}}">
      <div class="username">
        <i class="fa fa-user"></i>
        <input type="text" placeholder="Username" name="uname"/>
      </div>
      <div class="password">
        <i class="fa fa-lock"></i>
        <input type="password" placeholder="Password" name="upass"/>
      </div>
      <input type="submit" value="Login" class="btn" />
      </form>
    </div>
  </div>
</body>

</html>
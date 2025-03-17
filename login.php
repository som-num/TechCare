<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/loginstyles.css" />
    <title>Sign In Sign Up</title>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form__container signup__container">
        <form method="POST" action="function.php">
          <h1>Create Account</h1>
          <div class="socials">
            <!-- <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#"><i class="ri-google-fill"></i></a>
            <a href="#"><i class="ri-linkedin-fill"></i></a> -->
          </div>
          <!-- <span>or use your email for registration</span> -->
          <div class="form__group">
            <input type="text" name="full-name" placeholder="Name"  required/>
          </div>
          <div class="form__group">
            <input type="email" name="email" placeholder="Email" required/>
          </div>
          <div class="form__group">
            <input type="password" name="password" placeholder="Password" required/>
          </div>
          <button type="submit" name="signup-btn">SIGN UP</button>
          <!-- <a href="#" class="forgot__password">Forgot your password?</a> -->
          <a href="#" class="mobile__btn signIn">Sign In</a>
        </form>
      </div>

      
      <div class="form__container signin__container">
        <form method="POST" action="function.php">
          <h1>Sign in</h1>
          <div class="socials">
            <!-- <a href="#"><i class="ri-facebook-fill"></i></a>
            <a href="#"><i class="ri-google-fill"></i></a>
            <a href="#"><i class="ri-linkedin-fill"></i></a> -->
          </div>
          <!-- <span>or use your account</span> -->
          <div class="form__group">
            <input type="email" name="email" placeholder="Email" />
          </div>
          <div class="form__group">
            <input type="password" name="password" placeholder="Password" />
          </div>
          <!-- <a href="#" class="forgot__password">Forgot your password?</a> -->
            <button type="submit" name="signin-btn">SIGN IN</button>    
          <a href="#" class="mobile__btn signUp">Sign Up</a>
        </form>
      </div>
      <div class="overlay__container" id="overlayContainer">
        <div class="overlay__wrapper">
          <div class="overlay__panel overlay__panel__left">
            <h1>Welcome Back!</h1>
            <p>
              To keep connected with us please login with your personal info
            </p>
            <button class="signIn" >SIGN IN</button>
          </div>
          <div class="overlay__panel overlay__panel__right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start your journey with us</p>
            <button class="signUp" >SIGN UP</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      const container = document.getElementById("container");
      const signInButton = document.querySelectorAll(".signIn");
      const signUpButton = document.querySelectorAll(".signUp");

        signUpButton.forEach(button =>{
          button.addEventListener("click", () =>{
            container.classList.add("right__panel__active");
          });
        });
        signInButton.forEach(button =>{
          button.addEventListener("click", ()=>{
            container.classList.remove("right__panel__active");
          });
        });
    </script>
  </body>
</html>

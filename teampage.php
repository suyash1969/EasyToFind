<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>my team</title>

<style>
  @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");

* {
  padding: 0;
  margin: 0;
}

body {
  background-color: #12172b;
  font-family: "Poppins", sans-serif;
}

.container {
  margin: 20px 40px;
  color: white;
}

.heading {
  font-size: 60px;
  color: white;
}

.heading span {
  font-style: italic;
  font-size: 30px;
}

.profiles {
  display: flex;
  justify-content: space-around;
  margin: 20px 80px;
}

.profile {
  flex-basis: 260px;
}

.profile .profile-img {
  height: 260px;
  width: 260px;
  border-radius: 50%;
  filter: grayscale(100%);
  cursor: pointer;
  transition: 400ms;
}

.profile:hover .profile-img {
  filter: grayscale(0);
}

.user-name {
  margin-top: 30px;
  font-size: 35px;
}

.profile h5 {
  font-size: 18px;
  font-weight: 100;
  letter-spacing: 3px;
  color: #ccc;
}

.profile p {
  font-size: 16px;
  margin-top: 20px;
  text-align: justify;
}

@media only screen and (max-width: 1150px) {
  .profiles {
    flex-direction: column;
  }

  .profile {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .profile p {
    text-align: center;
    margin: 20px 60px 80px 60px;
    font-size: 20px;
  }
}

@media only screen and (max-width: 900px) {
  .heading {
    font-size: 40px;
    color: white;
    text-align: center;
  }

  .heading span {
    font-size: 15px;
  }

  .profiles {
    margin: 20px 0;
  }

  .profile p {
    margin: 20px 10px 80px 10px;
  }
}

</style>
</head>

<body>
  <div class="container">
    <h1 class="heading"><span>meet</span>Our Team</h1>

    <div class="profiles">
      <div class="profile">
        <img src="./file/apoorv.jpghom" class="profile-img">

        <h3 class="user-name">Apoorv Vikram Singh Rathore</h3>
        <h5>III rd year student at GLA University</h5>
        <p>I am eager to learn,determined and i never give up until i finish something.</p>
      </div>
      <div class="profile">
        <img src="./file/susy.jpg" class="profile-img">

        <h3 class="user-name">Suyash Prakash Singh</h3>
        <h5>III rd year student at GLA University</h5>
        <p>I get on well with all kinds of people,Hard work doesn’t bother me.</p>
      </div>
    </div>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>An error as occured</title>

	<link rel="preconnect" href="https://api.fonts.coollabs.io" />
	<link rel="stylesheet" href="https://api.fonts.coollabs.io/css?family=Montserrat:700&display=swap">

	<style>
		* {
			margin: 0;
			padding: 0;
		}

		.container {
			height: 100vh;
			font-family: "Montserrat", "sans-serif";
			font-weight: bolder;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}

		.container a {
			color: black;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>An error as occured.</h1>
		<h1> <span class="ascii">(╯°□°）╯︵ ┻━┻</span></h1>
		<a href="<?= base_url() ?>">Go back</a>
	</div>
</body>

</html>

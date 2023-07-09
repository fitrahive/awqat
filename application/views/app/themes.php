<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'partials/head.php' ?>
</head>

<body class="antialiased bg-[#FEFEFE] min-w-screen min-h-screen overflow-x-hidden text-[#35321B] flex flex-col justify-between">
	<main>
		<?php include 'partials/header.php' ?>

		<section class="max-w-[90rem] mx-auto w-full">
			<div class="p-8">
				<?php if ($this->session->flashdata('failed')) : ?>
					<div class="mt-4 p-4 text-sm text-red-800 font-semibold rounded-lg bg-red-50" role="alert">
						<?= $this->session->flashdata('failed') ?>
					</div>
				<?php endif ?>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="mt-4 p-4 text-sm text-emerald-800 font-semibold rounded-lg bg-emerald-50" role="alert">
						<?= $this->session->flashdata('success') ?>
					</div>
				<?php endif ?>

				<div class="mt-4">
					<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
						<?php foreach (theme() as $key => $name) : ?>
							<div class="col-span-1">
								<a href="<?= base_url('screen/themes/' . $key) ?>" up-target="main">
									<div class="flex flex-col gap-2 rounded p-2 <?= $theme === $key ? 'bg-green-700 font-bold' : 'bg-gray-700' ?>">
										<img class="rounded" src="<?= base_url('assets/img/themes/' . $key . '.png') ?>" alt="<?= $name ?>">
										<h1 class="text-lg text-white text-center"><?= $name ?></h1>
									</div>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include 'partials/footer.php' ?>
	<?php include 'partials/scripts.php' ?>
</body>

</html>

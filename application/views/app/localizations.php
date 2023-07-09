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

				<form class="mt-4" action="<?= current_url() ?>" method="POST" up-target="main">
					<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
						<div class="col-span-1">
							<div class="mb-6">
								<label for="label_fajr" class="block font-medium text-slate-700 cursor-pointer">
									Fajr Label
								</label>

								<div class="mt-2">
									<input type="text" name="label[fajr]" id="label_fajr" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input label for fajr" value="<?= $settings['label.fajr'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="label_sunrise" class="block font-medium text-slate-700 cursor-pointer">
									Sunrise Label
								</label>

								<div class="mt-2">
									<input type="text" name="label[sunrise]" id="label_sunrise" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input label for sunrise" value="<?= $settings['label.sunrise'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="label_dhuhr" class="block font-medium text-slate-700 cursor-pointer">
									Dhuhr Label
								</label>

								<div class="mt-2">
									<input type="text" name="label[dhuhr]" id="label_dhuhr" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input label for dhuhr" value="<?= $settings['label.dhuhr'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="label_asr" class="block font-medium text-slate-700 cursor-pointer">
									Asr Label
								</label>

								<div class="mt-2">
									<input type="text" name="label[asr]" id="label_asr" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input label for asr" value="<?= $settings['label.asr'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="label_maghrib" class="block font-medium text-slate-700 cursor-pointer">
									Maghrib Label
								</label>

								<div class="mt-2">
									<input type="text" name="label[maghrib]" id="label_maghrib" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input label for maghrib" value="<?= $settings['label.maghrib'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="label_isha" class="block font-medium text-slate-700 cursor-pointer">
									Isha Label
								</label>

								<div class="mt-2">
									<input type="text" name="label[isha]" id="label_isha" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input label for isha" value="<?= $settings['label.isha'] ?>">
								</div>
							</div>
						</div>

						<div class="col-span-1">
							<div class="mb-6">
								<label for="adjustment_fajr" class="block font-medium text-slate-700 cursor-pointer">
									Fajr Adjustment
								</label>

								<div class="mt-2">
									<input type="number" name="adjustment[fajr]" id="adjustment_fajr" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input adjustment for fajr" value="<?= $settings['adjustment.fajr'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="adjustment_sunrise" class="block font-medium text-slate-700 cursor-pointer">
									Sunrise Adjustment
								</label>

								<div class="mt-2">
									<input type="number" name="adjustment[sunrise]" id="adjustment_sunrise" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input adjustment for sunrise" value="<?= $settings['adjustment.sunrise'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="adjustment_dhuhr" class="block font-medium text-slate-700 cursor-pointer">
									Dhuhr Adjustment
								</label>

								<div class="mt-2">
									<input type="number" name="adjustment[dhuhr]" id="adjustment_dhuhr" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input adjustment for dhuhr" value="<?= $settings['adjustment.dhuhr'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="adjustment_asr" class="block font-medium text-slate-700 cursor-pointer">
									Asr Adjustment
								</label>

								<div class="mt-2">
									<input type="number" name="adjustment[asr]" id="adjustment_asr" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input adjustment for asr" value="<?= $settings['adjustment.asr'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="adjustment_maghrib" class="block font-medium text-slate-700 cursor-pointer">
									Maghrib Adjustment
								</label>

								<div class="mt-2">
									<input type="number" name="adjustment[maghrib]" id="adjustment_maghrib" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input adjustment for maghrib" value="<?= $settings['adjustment.maghrib'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="adjustment_isha" class="block font-medium text-slate-700 cursor-pointer">
									Isha Adjustment
								</label>

								<div class="mt-2">
									<input type="number" name="adjustment[isha]" id="adjustment_isha" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input adjustment for isha" value="<?= $settings['adjustment.isha'] ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="mt-4 lg:mt-0 lg:flex lg:justify-end mb-6">
						<button type="submit" class="w-full py-3 lg:w-fit lg:px-5 bg-sky-500 hover:bg-sky-700 leading-5 rounded-md font-semibold text-white transition duration-100 ease-linear">
							Save
						</button>
					</div>
				</form>
			</div>
		</section>
	</main>

	<?php include 'partials/footer.php' ?>
	<?php include 'partials/scripts.php' ?>
</body>

</html>

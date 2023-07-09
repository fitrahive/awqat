<header class="w-full border-b">
	<div class="max-w-[90rem] mx-auto">
		<div class="flex lg:justify-between">
			<div class="py-4 px-6 border-r lg:border-none shrink-0">
				<img class="w-auto h-[25px]" src="<?= base_url('assets/img/icon.png') ?>" alt="Awqat Icon">
			</div>

			<div class="overflow-x-auto">
				<ul class="flex px-4">
					<li class="p-4 shrink-0" <?= current_url() === base_url('screen/profile') ? 'font-semibold' : '' ?>>
						<a up-target="main" href="<?= base_url('screen/profile') ?>">Masjid Profile</a>
					</li>
					<li class="p-4 shrink-0" <?= current_url() === base_url('screen/times') ? 'font-semibold' : '' ?>>
						<a up-target="main" href="<?= base_url('screen/times') ?>">Prayer Times</a>
					</li>
					<li class="p-4 shrink-0" <?= current_url() === base_url('screen/themes') ? 'font-semibold' : '' ?>>
						<a up-target="main" href="<?= base_url('screen/themes') ?>">Layout Style</a>
					</li>
					<li class="p-4 shrink-0" <?= current_url() === base_url('screen/locales') ? 'font-semibold' : '' ?>>
						<a up-target="main" href="<?= base_url('screen/locales') ?>">Localization</a>
					</li>
					<li class="p-4 shrink-0 <?= current_url() === base_url('screen/quotes') ? 'font-semibold' : '' ?>">
						<a up-target="main" href="<?= base_url('screen/quotes') ?>">Running Text</a>
					</li>
					<li class="p-4 shrink-0 <?= current_url() === base_url('screen/account') ? 'font-semibold' : '' ?>">
						<a up-target="main" href="<?= base_url('screen/account') ?>">Account</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>

<section class="bg-sky-100">
	<div class="max-w-[90rem] mx-auto w-full">
		<div class="px-8 py-4">
			<h2 class="text-xl leading-normal font-semibold"><?= $page ?></h2>
		</div>
	</div>
</section>

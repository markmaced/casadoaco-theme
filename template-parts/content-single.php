<section class="w-full py-16 md:px-0 px-5">
	<div class="max-w-6xl mx-auto">
		<h2 class="text-5xl font-rockstar text-casadoaco-orange mb-10"><?php echo the_title() ?></h2>
		<?php the_post_thumbnail('large', ['class' => 'w-full h-[632px] object-cover rounded-md']); ?>
		<div class="flex items-center space-x-5 py-5 bg-white mb-10">
			<img src="<?php echo get_theme_image('avatar.png'); ?>" alt="Avatar do usuário"
				class="w-12 h-12 rounded-full border border-gray-300" />
			<div>
				<p class="text-sm font-semibold text-gray-900 font-noto"><?php the_author(); ?></p>
				<p class="text-xs text-gray-500 font-noto">
					<?php
					$categories = get_the_category();
					if (!empty($categories)) {
						echo esc_html($categories[0]->name) . ' - ';
					}
					echo get_the_date('d/m/Y');
					?>
				</p>
			</div>
		</div>
		<div class="font-noto mb-10">
			<?php echo the_content() ?>
		</div>
		<div class="mx-auto w-[95%] bg-black h-[1px] mb-5"></div>
		<div class="w-full mt-5 flex gap-3 relative justify-center">
			<button type="button" class="flex gap-2 open-share-bottom cursor-pointer">
				<p class="text-xs text-custom-blue">Compartilhe</p>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18.8"
					height="17.42" viewBox="0 0 18.8 17.42">
					<defs>
						<clipPath id="clip-path">
							<rect id="Retângulo_34" data-name="Retângulo 34" width="18.8" height="17.42"
								transform="translate(0 0)" fill="#263460"></rect>
						</clipPath>
					</defs>
					<g id="Grupo_21" data-name="Grupo 21" clip-path="url(#clip-path)">
						<path id="Caminho_57" data-name="Caminho 57"
							d="M1.088,14.1c1.179-4.017,4.56-6.664,7.97-6.5l-2.68,3.9,6.211-3.974L18.8,3.559,11.644,1.78,4.489,0,8.072,2.688A10.436,10.436,0,0,0,.491,10.227,11.337,11.337,0,0,0,.684,17.42a10.073,10.073,0,0,1,.4-3.317"
							transform="translate(0 0)" fill="#263460"></path>
					</g>
				</svg>
			</button>
			<div class="w-share-content h-auto p-10 bg-white shadow-share rounded-2xl flex flex-col gap-y-3 justify-start transition-all duration-300 absolute top-8 md:left-1/2 left-0 share-content-bottom z-50 w-[220px]"
				style="display: none;">
				<?php $currentUrl = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
				<?php $pageTitle = htmlspecialchars( get_the_title() ?? '' ); ?>
				<input type="hidden" name="siteUrl" value="<?php echo $currentUrl?>">
				<button type="button"
					class="shares-btn share-copy text-left flex gap-2 hover:text-primary text-xs text-black border-b pb-2">
					<p class="w-6">
						<svg id="Grupo_24" class="object-contain" data-name="Grupo 24"
							xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
							height="auto" viewBox="0 0 22.652 18.03">
							<defs>
								<clipPath id="clip-path">
									<rect id="Retângulo_36" data-name="Retângulo 36" width="22.652" height="18.03"
										fill="none"></rect>
								</clipPath>
							</defs>
							<g id="Grupo_23" data-name="Grupo 23" clip-path="url(#clip-path)">
								<path id="Caminho_58" data-name="Caminho 58"
									d="M12.485,12.463l1.422,1.422a5.571,5.571,0,0,0,1.64-3.533,4.76,4.76,0,0,0-.246-1.88,4.316,4.316,0,0,0-1.027-1.642L12,4.552,10.418,2.973,8.729,1.284A4.328,4.328,0,0,0,7.087.257,4.9,4.9,0,0,0,4.255.165a5.682,5.682,0,0,0-2.594,1.5A5.572,5.572,0,0,0,.012,5.206a4.744,4.744,0,0,0,.245,1.88A4.329,4.329,0,0,0,1.285,8.728L6.83,14.273A4.326,4.326,0,0,0,8.472,15.3a4.9,4.9,0,0,0,2.831.092,5.549,5.549,0,0,0,.932-.335l-1.578-1.578a3.172,3.172,0,0,1-.439.06A2.745,2.745,0,0,1,9.133,13.4a2.316,2.316,0,0,1-.881-.55L2.707,7.306a2.308,2.308,0,0,1-.551-.881,2.9,2.9,0,0,1-.044-1.669,3.673,3.673,0,0,1,.972-1.672A3.565,3.565,0,0,1,5.34,2.017a2.743,2.743,0,0,1,1.085.139,2.324,2.324,0,0,1,.882.55l1.439,1.44,1.422,1.422,2.683,2.684a2.3,2.3,0,0,1,.55.881,2.9,2.9,0,0,1,.044,1.669,3.673,3.673,0,0,1-.961,1.662"
									transform="translate(0 0)"></path>
								<path id="Caminho_59" data-name="Caminho 59"
									d="M177.1,63.756l-1.422-1.422a5.575,5.575,0,0,0-1.639,3.533,4.76,4.76,0,0,0,.246,1.88,4.323,4.323,0,0,0,1.027,1.642l2.277,2.277,1.578,1.578,1.689,1.689a4.323,4.323,0,0,0,1.642,1.027,4.9,4.9,0,0,0,2.831.092,5.68,5.68,0,0,0,2.594-1.5,5.571,5.571,0,0,0,1.649-3.544,4.76,4.76,0,0,0-.246-1.88,4.323,4.323,0,0,0-1.027-1.642l-5.545-5.545a4.326,4.326,0,0,0-1.642-1.028,4.91,4.91,0,0,0-2.831-.092,5.541,5.541,0,0,0-.932.335l1.578,1.578a3.178,3.178,0,0,1,.439-.061,2.748,2.748,0,0,1,1.085.139,2.315,2.315,0,0,1,.882.55l5.545,5.545a2.307,2.307,0,0,1,.551.881,2.894,2.894,0,0,1,.043,1.669,3.668,3.668,0,0,1-.97,1.673A3.569,3.569,0,0,1,184.24,74.2a2.742,2.742,0,0,1-1.085-.138,2.312,2.312,0,0,1-.882-.55l-1.44-1.44-1.422-1.422-2.683-2.684a2.3,2.3,0,0,1-.55-.881,2.894,2.894,0,0,1-.044-1.669,3.659,3.659,0,0,1,.96-1.662"
									transform="translate(-166.927 -58.189)"></path>
							</g>
						</svg>
					</p>
					<p>Copiar link</p>
				</button>
				<button type="button"
					class="shares-btn share-facebook text-left flex gap-2 hover:text-primary text-xs text-black border-b pb-2">
					<p class="w-6">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9.457"
							height="20.257" viewBox="0 0 9.457 20.257">
							<defs>
								<clipPath id="clip-path">
									<rect id="Retângulo_40" data-name="Retângulo 40" width="9.457" height="20.257"
										fill="none"></rect>
								</clipPath>
							</defs>
							<g id="Grupo_37" data-name="Grupo 37" transform="translate(0 0)">
								<g id="Grupo_36" data-name="Grupo 36" transform="translate(0 0)"
									clip-path="url(#clip-path)">
									<path id="Caminho_69" data-name="Caminho 69"
										d="M6.23,6.083V4.465a.86.86,0,0,1,.9-.978H9.4V.017L6.273,0A3.96,3.96,0,0,0,2.007,4.248V6.083H0v4.05H2.025V20.257H6.074V10.133H9.085l.147-1.592.225-2.457Z"
										transform="translate(0 0)" fill-rule="evenodd"></path>
								</g>
							</g>
						</svg>
					</p>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($currentUrl) ?>" target="_blank">Facebook</a>
				</button>
				<button type="button"
					class="shares-btn share-twitter text-left flex gap-2 hover:text-primary text-xs text-black border-b pb-2">
					<p class="w-6">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							width="19.903" height="15.917" viewBox="0 0 19.903 15.917">
							<defs>
								<clipPath id="clip-path">
									<rect id="Retângulo_41" data-name="Retângulo 41" width="19.903" height="15.917"
										fill="#de445f"></rect>
								</clipPath>
							</defs>
							<g id="Grupo_39" data-name="Grupo 39" transform="translate(0 0)">
								<g id="Grupo_38" data-name="Grupo 38" transform="translate(0 0)"
									clip-path="url(#clip-path)">
									<path id="Caminho_70" data-name="Caminho 70"
										d="M19.9,1.879a8.289,8.289,0,0,1-2.339.638A4.055,4.055,0,0,0,19.359.289a8.293,8.293,0,0,1-2.593.978A4.119,4.119,0,0,0,13.782,0,4.046,4.046,0,0,0,9.7,4.013a4.1,4.1,0,0,0,.1.918A11.668,11.668,0,0,1,1.386.731,3.979,3.979,0,0,0,2.653,6.1,4.126,4.126,0,0,1,.8,5.595v.051A3.906,3.906,0,0,0,1.08,7.1a4.077,4.077,0,0,0,3,2.492A4.545,4.545,0,0,1,3,9.727a4.483,4.483,0,0,1-.765-.068,4.07,4.07,0,0,0,3.809,2.789A8.25,8.25,0,0,1,.978,14.174,9.317,9.317,0,0,1,0,14.115a11.738,11.738,0,0,0,6.266,1.8,11.359,11.359,0,0,0,11.332-9,10.905,10.905,0,0,0,.28-2.432c0-.17,0-.349-.008-.519A8.172,8.172,0,0,0,19.9,1.879"
										transform="translate(0 0)" fill-rule="evenodd"></path>
								</g>
							</g>
						</svg>
					</p>
					<a href="https://twitter.com/intent/tweet?url=<?= urlencode($currentUrl) ?>&text=<?= urlencode($pageTitle) ?>" target="_blank">Twitter</a>
				</button>
				<button type="button"
					class="shares-btn share-telegram text-left flex gap-2 hover:text-primary text-xs text-black border-b pb-2">
					<p class="w-6">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							width="22.734" height="17.369" viewBox="0 0 22.734 17.369">
							<defs>
								<clipPath id="clip-path">
									<rect id="Retângulo_39" data-name="Retângulo 39" width="22.734" height="17.369"
										fill="none"></rect>
								</clipPath>
							</defs>
							<g id="Grupo_35" data-name="Grupo 35" transform="translate(0 0)">
								<g id="Grupo_34" data-name="Grupo 34" transform="translate(0 0)"
									clip-path="url(#clip-path)">
									<path id="Caminho_68" data-name="Caminho 68"
										d="M22.547.3a.823.823,0,0,0-.92-.251L.772,7.586A1.17,1.17,0,0,0,.51,9.651l2.837,1.937a1.23,1.23,0,0,0,1.266.072l3.051-1.608a.288.288,0,0,1,.307.486L6,12.008a1.229,1.229,0,0,0-.494.985v3.341a.979.979,0,0,0,1.519.815l2.1-1.395a.288.288,0,0,1,.321,0l2.067,1.409a1.172,1.172,0,0,0,.662.2,1.175,1.175,0,0,0,1-.554L22.613,1.257A.826.826,0,0,0,22.547.3"
										transform="translate(0 0)"></path>
								</g>
							</g>
						</svg>
					</p>
					<a href="https://t.me/share/url?url=<?= urlencode($currentUrl) ?>&text=<?= urlencode($pageTitle) ?>" target="_blank">Telegram</a>
				</button>
				<button type="button"
					class="shares-btn share-linkedin text-left flex gap-2 hover:text-primary text-xs text-black border-b pb-2">
					<p class="w-6">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18.03"
							height="18.03" viewBox="0 0 18.03 18.03">
							<defs>
								<clipPath id="clip-path">
									<rect id="Retângulo_37" data-name="Retângulo 37" width="18.03" height="18.03"
										fill="none"></rect>
								</clipPath>
							</defs>
							<g id="Grupo_32" data-name="Grupo 32" transform="translate(0 0)">
								<g id="Grupo_32-2" data-name="Grupo 32" transform="translate(0 0)"
									clip-path="url(#clip-path)">
									<path id="Caminho_66" data-name="Caminho 66"
										d="M16.4,0H1.631A1.631,1.631,0,0,0,0,1.631V16.4A1.631,1.631,0,0,0,1.631,18.03H16.4A1.631,1.631,0,0,0,18.03,16.4V1.631A1.63,1.63,0,0,0,16.4,0M5.579,15.569a.474.474,0,0,1-.475.474H3.084a.474.474,0,0,1-.474-.474V7.1a.475.475,0,0,1,.474-.475H5.1a.475.475,0,0,1,.474.475ZM4.094,5.826A1.919,1.919,0,1,1,6.013,3.907,1.919,1.919,0,0,1,4.094,5.826m12.044,9.781a.436.436,0,0,1-.436.436H13.533a.436.436,0,0,1-.436-.436V11.634c0-.592.174-2.6-1.549-2.6-1.336,0-1.607,1.372-1.662,1.988v4.582a.436.436,0,0,1-.436.436h-2.1a.436.436,0,0,1-.436-.436V7.061a.437.437,0,0,1,.436-.437h2.1a.436.436,0,0,1,.436.437V7.8a2.978,2.978,0,0,1,2.8-1.317c3.472,0,3.452,3.243,3.452,5.026Z"
										transform="translate(0 0)"></path>
								</g>
							</g>
						</svg>
					</p>
					<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($currentUrl) ?>" target="_blank">Linkedin</a>
				</button>
				<button type="button"
					class="shares-btn share-whatsapp text-left flex gap-2 hover:text-primary text-xs text-black border-b pb-2">
					<p class="w-6">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18.02"
							height="18.03" viewBox="0 0 18.02 18.03">
							<defs>
								<clipPath id="clip-path">
									<rect id="Retângulo_38" data-name="Retângulo 38" width="18.02" height="18.03"
										fill="none"></rect>
								</clipPath>
							</defs>
							<g id="Grupo_33" data-name="Grupo 33" transform="translate(0 0)">
								<g id="Grupo_33-2" data-name="Grupo 33" transform="translate(0 0)"
									clip-path="url(#clip-path)">
									<path id="Caminho_67" data-name="Caminho 67"
										d="M13.23,10.56c-.223-.108-1.286-.632-1.486-.7s-.346-.108-.485.108a10.662,10.662,0,0,1-.693.84c-.123.146-.247.162-.47.054A5.958,5.958,0,0,1,8.356,9.8,6.568,6.568,0,0,1,7.147,8.3c-.123-.216-.008-.331.1-.439.093-.092.216-.246.323-.377a.764.764,0,0,0,.077-.1c.054-.085.085-.154.139-.254a.4.4,0,0,0-.015-.377c-.054-.108-.493-1.171-.67-1.6S6.739,4.8,6.608,4.8s-.27-.023-.416-.023a.809.809,0,0,0-.578.269A2.438,2.438,0,0,0,4.86,6.84a2.555,2.555,0,0,0,.107.732,4.885,4.885,0,0,0,.778,1.494,8.86,8.86,0,0,0,3.7,3.25c2.2.863,2.2.578,2.6.539a2.142,2.142,0,0,0,1.463-1.024,1.777,1.777,0,0,0,.131-1.024,1.27,1.27,0,0,0-.416-.247m4.79-1.995A8.853,8.853,0,0,0,.331,8.4c0,.123-.007.254-.007.385a8.683,8.683,0,0,0,1.271,4.536L0,18.031l4.9-1.556A8.859,8.859,0,0,0,18.02,8.789Z"
										transform="translate(0 0)" fill-rule="evenodd"></path>
								</g>
							</g>
						</svg>
					</p>
					<a href="https://api.whatsapp.com/send?text=<?= urlencode($currentUrl) ?>" target="_blank">Whatsapp</a>
				</button>
			</div>
		</div>
	</div>
</section>
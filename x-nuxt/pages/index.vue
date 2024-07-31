<script setup lang="ts">
import actions from '~/actions';
import MenuItem from '~/components/MenuItem.vue';
import TweetCreate from '~/components/TweetCreate.vue';

const imgLogo = 'https:/pbs.twimg.com/profile_images/1441217650680500231/NtMy9zs5_normal.jpg'

definePageMeta({
	middleware: ['auth']
});

onMounted(async () => await actions.tweet.fetchTweets());

const MenuItems = [
	{ title: 'Twitter', 				icon: 'twitter', route: '/' },
	{ title: 'Home', 					icon: 'home', route: '/timeline' },
	{ title: 'Explore', 				icon: 'explorer', route: '/explore' },
	{ title: 'Notifications', 			icon: 'notifications', route: '/notifications' },
	{ title: 'Messages', 				icon: 'messages', route: '/messages' },
	{ title: 'Bookmarks', 				icon: 'bookmarks', route: '/bookmarks' },
	{ title: 'Twitter Blue', 			icon: 'twitter-blue', route: '/subscribe' },
	{ title: 'Verified Organization', 	icon: 'verified-org', route: '/verified-organization' },
	{ title: 'Profile', 				icon: 'profile', route: '/profile' },
	{ title: 'More', 					icon: 'more', route: '/more' },
];

const store = useTweetStore();
const tweets = computed(() => store.tweets);

</script>

<template>
	<div class="font-sans antialiased h-full bg-black text-white">
		<div class="container mx-auto grid grid-cols-4 h-full">

			<!-- menu -->
			<div class="pt-px text-[#d6d9db] space-y-2 flex flex-col">

				<MenuItem
					v-for="menuItem in MenuItems"
					:key="menuItem.title"
					:route="menuItem.route"
					:title="menuItem.title"
					:icon="menuItem.icon"
				/>

				<div>
					<!-- <x-btn.tweet class="mt-6">TweetCreate</x-btn.tweet> -->
				</div>

			</div>

			<!-- center -->
			<div class="col-span-2 border-x-[0.625px] border-lines relative">
				<div class="sticky top-0 w-full backdrop-blur-xl">
					<div class="flex-1 m-2">
						<h2 class="px-4 py-2 text-lg font-semibold text-white">
							Home
						</h2>
					</div>

					<ul class="w-full grid grid-cols-2 text-center font-bold text-gray-500 border-lines">
						<li class="pt-2 cursos-pointer hover:bg-neutral-900 flex justify-center cursor-pointer">
							<div class="border-b-4 w-fit pb-3 text-white border-twitter">For you</div>
						</li>
						<li class="pt-2 cursos-pointer hover:bg-neutral-900 flex justify-center cursor-pointer">
							<div class="border-b-4 w-fit pb-3 text-white">Following</div>
						</li>
					</ul>
				</div>

				<div class="border-t-[0.625px] border-lines py-5 w-full z-0">
					<TweetCreate />
				</div>
				<ShowMore />
				<Timeline />
			</div>

			<!-- right side -->
			<div class="mt-2 pl-6 space-y-5">
				<div class="flex relative">
					<!-- <x-icons.search class="absolute mt-[15px] ml-5 w-5 fill-neutral-500" /> -->
					 <input type="text" placeholder="Search Twitter"
					 class="bg-neutral-900 rounded-full font-bold focus:outline-none shadow h-12 px-14 border-none w-full" />
				</div>

				<div class="rounded-2xl border-lines border-[0.625px] min-h-40 px-4 py-2">
					<div class="font-extrabold text-xl">Relevant people</div>
					<div class="flex align-top space-x-2 mt-4 mb-4">
						<div>
							<img alt="Pinguim Academy" draggable="true" :src="imgLogo"
								class="w-12 h-12 rounded-full" />
						</div>
						<div class="w-full">
							<div class="flex justiy-between w-full">
								<div>
									<div class="text-white font-bold text-base">Thiago Fernando</div>
									<div class="text-sm text-neutral-500 font-semibold">@othiago.fernando</div>
								</div>
								<div class="flex items-center">
									<!-- <x-btn.follow>Follow</x-btn.follow> -->
								</div>
							</div>
							<div class="text-[15px] mt-1">
								Helping developers to become better
							</div>
						</div>
					</div>
				</div>
				<div class="rounded-2xl min-h-40 pt-2 bg-neutral-900">
						<div class="font-extrabold text-xl mb-6 p-4">What's happening</div>
						<div>
							<div class="px-4 py-3 cursor-pointer hover:bg-neutral-800">
								<div class="flex items-center justify-between relative">
									<span class="text-sm text-neutral-500">Sports . Trending</span>
									<!-- <x-tweet.action icon="dots" color="blue" class="absolute right-1" /> -->
								</div>
								<div class="text-white font-bold">
									De Bruyne
								</div>
								<div class="text-sm text-neutral-500">
									Trending with <span class="text-twitter">#MCFC</span>
								</div>
							</div>

							<div class="px-4 py-3 cursor-pointer hover:bg-neutral-800">
								<div class="flex items-center justify-between relative">
									<span class="text-sm text-neutral-500">Politics . Trending</span>
									<!-- <x-tweet.action icon="dots" color="blue" class="absolute right-1" /> -->
								</div>
								<div class="text-white font-bold">Melania</div>
								<div class="text-sm text-neutral-500">
									Trending with <span class="text-twitter">First Lady</span>
								</div>
							</div>

							<div class="px-4 py-4 cursor-pointer hover:bg-neutral-800 rounded-b-xl text-twitter">
								Show more
							</div>
						</div>
					</div>
				<div class="text-sm text-neutral-500 flex gap-2 flex-wrap pl-4">
					<a href="#" class="hover:underline">Terms of Service</a>
					<a href="#" class="hover:underline">Privacy Policy</a>
					<a href="#" class="hover:underline">Cookie Policy</a>
					<a href="#" class="hover:underline">Accessibility</a>
					<a href="#" class="hover:underline">Ads info</a>
					<a href="#" class="hover:underline flex-items-center">
						More
						<!-- <x-icons.dots class="ml-1 h-4 fill-gray-500" /> -->
					</a>
					<span>© 2024 X Corp.</span>
				</div>
			</div>
		</div>
	</div>
</template>

<!--
<h3 class="font-bold text-gray-500">Tweets</h3>

<div v-for="tweet in tweets" :key="tweet.id" class="border-1 mb-2">
	<p class="mb-0">{{ tweet.content }}</p>
</div> -->

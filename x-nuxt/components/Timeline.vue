<script setup lang="ts">
import actions from '~/actions';

let perPage = ref(10);

let infinityScroll = () => {
	const observer = new IntersectionObserver((items) => {

	} , {
	});
}

onMounted( async () => await actions.tweet.fetchTweets())
const store = useTweetStore();
const tweets = computed(() => store.tweets);

</script>

<template>
  <div class="text-white text-lg w-full">

	<div class="text-white bg-black font-light">

		<template v-for="tweet in tweets">
			<Tweet :tweet="tweet" />
		</template>

	</div>

  </div>
</template>

<style scoped></style>

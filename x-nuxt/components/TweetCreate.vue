<script setup lang="ts">
import type { CreateForm } from '~/actions/tweet/create';
import Button from './Button.vue';
import actions from '~/actions';

const userAvatar = 'https:/pbs.twimg.com/profile_images/1441217650680500231/NtMy9zs5_normal.jpg'

const editing = ref<boolean>(false);

const form = ref<CreateForm>({ content: '' })

const handleTweet = async () => {
	await actions.tweet.create(form.value);
	form.value.content = '';
}
</script>

<template>
	<div class="px-3 w-full">
		<div class="flex align-top">
			<div>
				<img alt="Pinguim Academy" draggable="true" class="rounded-full mr-2" :src="userAvatar" />
			</div>

			<form @submit.prevent="handleTweet" class="w-full" ref="tweetForm" id="tweet-create-form">
				<div class="w-full">
					<label>
						<textarea
						class="bg-transparent placeholder-gray-500 text-white font-light text-xl w-full resize-none focus:outline-none focus:ring-0 mt-1"
						rows="2" cols="50" placeholder="What's happening?" required
						@keydown="editing = true"
						@blur="editing = false"
						@keydown.shift.enter.prevent="handleTweet"
						v-model="form.content"
						></textarea>
					</label>

					<div class="flex justify-between" :class="{ 'border-t-[0.625px] border-lines pt-4': editing }">
						<div class="flex items-center space-x-1"></div>

						<Button small type="submit">🐥 tweet it</Button>

					</div>
				</div>
			</form>

		</div>
	</div>
</template>

<style scoped></style>

<script setup lang="ts">
import Tweet from '~/actions/tweet';


defineProps({
	tweet: Tweet,
})

</script>

<template>

<div
    class="
        border-y-[0.625px] border-lines py-2 px-3
        bg-transparent hover:bg-opacity-20
        hover:bg-gray-900 cursor-pointer
    "
>
    <div class="flex align-top space-x-2">
        <div>
            <img alt="Pinguim Academy" draggable="true" class="rounded-full"
                 src="https://pbs.twimg.com/profile_images/1441217650680500231/NtMy9zs5_normal.jpg"
            />
        </div>

        <div class="w-full">
            <div class="flex justify-between w-full">
                <div>
                    <span class="text-white font-bold text-base flex items-center space-x-1">
                        <span>{{ tweet.user.name }}</span>
                        <nuxt-icon name="twitter-blue" />
                    </span>
                    <span class="text-sm text-neutral-500 font-semibold">@{{ tweet.user.name }} · {{ tweet.created_at }}</span></div>
                <div>
                </div>
            </div>
            <div class="text-[15px]">
                {{ tweet.content }}
            </div>
            <div class="flex items-center justify-between w-4/5 -ml-3 mt-1">
                <!-- <x-tweet.action icon="reply" color="blue" counter="21" />
                <x-tweet.action icon="retweet" color="green" counter="4" />
                <x-tweet.action icon="like" color="pink" counter="101" />
                <x-tweet.action icon="view" color="blue" counter="75.3K" />
                <x-tweet.action icon="share" color="blue" /> -->
            </div>
        </div>
    </div>
</div>

</template>

<style scoped></style>


@props([
    'tweet'
])

<script setup lang="ts">

defineProps({
	title: String,
	route: String,
	icon: String,
});

</script>

<template>
    <NuxLink :to="route"
		class="cursor-pointer bg-transparent hover:bg-gray-200 hover:bg-opacity-10 rounded-md p-2 inline-block">
		<div class="flex items-center space-x-2">
			<nuxt-icon v-if="icon" :name="icon" class="text-gray-500 font-thin" />

			<div v-if="title" class="font-bold text-lg truncate">
				{{ title }}
			</div>
		</div>
	</NuxLink>
</template>
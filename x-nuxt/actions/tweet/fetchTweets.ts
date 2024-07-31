import type { Tweet } from "~/actions/tweet";
import type { BaseResponse } from "..";

export async function fetchTweets() {
	const response = await useGet("/api/tweets");

	const data = response.data.value as BaseResponse<Tweet[]>;

	const store = useTweetStore();
	store.loadTweets(data.data);
}
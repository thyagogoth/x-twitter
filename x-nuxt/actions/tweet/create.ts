import type { Tweet } from '.';
import type { BaseResponse } from '..';

export interface CreateForm {
    content: string;
}


export async function create(tweet: CreateForm) {
    const response = await usePost("/api/tweets", {body: tweet})

	const data = response.data.value as BaseResponse<Tweet>;

    useTweetStore().addTweet(data.data)
}


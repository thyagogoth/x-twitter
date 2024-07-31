import type { Config } from 'tailwindcss'

export default <Partial<Config>>{
	theme: {
		extend: {
			width: {
				tb: '0.625px',
			},
			colors: {
				twitter: '#1DA1F2',
				lines: '#2f3336',
			},
		},
	},
}

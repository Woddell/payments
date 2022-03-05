export const api = {
    url: 'http://payments.test/api/',
    headers: {
        'Access-Control-Allow-Origin': '*',
        'Content-Type': 'application/json',
    },
    async get(endpoint, options = {}) {
        let response = await axios.get(
            this.url + endpoint,
            {
                params: options,
                headers: this.headers
            })
        if (response.status !== 200) {
            console.error('Failed to get data')
            return {}
        }
        return response.data
    }
}

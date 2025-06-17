
            <form method="GET" action="{{ route('home') }}" class="mb-5 w-50 m-auto">
                <div class="input-group">
                    <input
                        class="form-control"
                        name="name"
                        type="text"
                        placeholder="Enter search term..."
                        aria-label="Enter search term..."
                        aria-describedby="button-search"
                        value="{{ request('name') }}"
                    />
                    <button
                        class="btn btn-success"
                        id="button-search"
                        type="submit"
                    >
                        Search
                    </button>
                </div>
            </form>

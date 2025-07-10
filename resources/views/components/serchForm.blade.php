
            <form method="GET" action="{{ route('home') }}" class="mb-5 w-50 m-auto">
                <div class="d-flex align-items-center justify-content-center gap-2 shadow rounded-pill px-3 py-2" style="background: linear-gradient(90deg, #ECFDF5 0%, #A4F4CF 100%);">
                    <input
                        class="form-control border-0 bg-transparent"
                        name="name"
                        type="text"
                        placeholder="Type to search..."
                        aria-label="Enter search term..."
                        aria-describedby="button-search"
                        value="{{ request('name') }}"
                        style="box-shadow: none; font-size: 1.1rem;"
                    />
                    <button 
                        class="btn bg-background text-light rounded-pill px-4 d-flex align-items-center gap-2"
                        id="button-search"
                        type="submit"
                        style="font-weight: 500; letter-spacing: 1px;"
                    >
                        <i class="bi bi-search"></i>
                        <span>Search</span>
                    </button>
                </div>
            </form>



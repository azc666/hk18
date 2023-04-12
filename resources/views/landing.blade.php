<x-guest-layout>

  <div class="bg-[url('https://hk17.test/assets/image001.png')] bg-cover h-auto">

    <div class="h-screen bg-gradient-to-l from-transparent to-white">

      <div class="flex min-h-screen">
        <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-8 xl:px-24">

          <div class="w-full max-w-lg pr-2 mx-auto ml-12 mr-6 -mt-24">
            <div>
              <img src="assets/HKheader.png" alt="HK">
              <h2 class="mt-6 text-2xl font-extrabold text-gray-600">
                Sign in to your account
              </h2>
            </div>

            <div class="mt-8">

              <div class="mt-6">

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-600">
                  {{ session('status') }}
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                  @csrf

                  <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                      Username
                    </label>
                    <div class="mt-1">
                      <input id="username" name="username" type="text" autocomplete="username" required
                        value="{{ old('username') }}"
                        class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                  </div>

                  <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                      Password
                    </label>
                    <div class="mt-1">
                      <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                  </div>

                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <input id="remember_me" name="remember_me" type="checkbox"
                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                      <label for="remember_me" class="block ml-2 text-sm text-gray-900">
                        Remember me
                      </label>
                    </div>

                    <div class="text-sm">
                      <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                        Forgot your password?
                      </a>
                    </div>
                  </div>

                  <div>
                    <button type="submit"
                      class="flex justify-center w-full px-4 py-2 font-bold text-blue-100 bg-blue-600 border border-transparent rounded-md shadow-sm text-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                      Sign in
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</x-guest-layout>

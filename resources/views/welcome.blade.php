<?php

use Illuminate\Support\Facades\Route;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Welcome Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <!-- Font Awesome for profile icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen">
    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="text-2xl font-bold text-purple-600">FreelanceConnect</div>

            <!-- Main Navigation (visible on md and up) -->
            <nav class="hidden md:flex space-x-4">
                <!-- Dropdown: Find talent -->
                <a class="text-gray-700 hover:text-purple-600" href="{{ route('freelancers.index') }}">
                    Find talent
                </a>

                <!-- Dropdown: Find work -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-purple-600 focus:outline-none">
                        Find work
                        <i class="fas fa-chevron-down ml-1"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white border rounded shadow-lg hidden group-hover:block">
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">
                            Option 1
                        </a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">
                            Option 2
                        </a>
                    </div>
                </div>

                <!-- Other Navigation Links -->
                <a class="text-gray-700 hover:text-purple-600" href="#">
                    Why FreelanceConnect
                </a>
                <a class="text-gray-700 hover:text-purple-600" href="#">
                    What's new
                </a>
                <a class="text-gray-700 hover:text-purple-600" href="{{ route('payment.index') }}">
                    Pricing
                </a>
            </nav>

            <!-- Authentication Links -->
            @if (Route::has('login'))
            <div class="flex space-x-4">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-purple-600">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-purple-600">Logout</button>
                </form>
                <!-- Profile Edit Link -->
                <a href="{{ route('client.profile.edit') }}" class="text-gray-700 hover:text-purple-600">
                    <i class="fas fa-user-edit"></i> <!-- Profile Edit Icon -->
                </a>
                @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-purple-600">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-purple-600">Sign Up</a>
                @endif
                @endauth

            </div>
            @endif

        </div>
    </header>


    <!-- Hero Section -->
    <section class="bg-purple-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6">Work with the World's Best Talent</h1>
            <p class="text-lg md:text-xl mb-8">Connect with top freelancers across various fields to get your projects
                done efficiently.</p>
            <a href="#"
                class="px-8 py-3 bg-white text-purple-600 font-semibold rounded-lg shadow-lg hover:bg-purple-100 transition">Post
                Job</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">Hire Top Talent</h2>
            <p class="text-lg text-gray-600 mb-12">Join thousands of businesses finding skilled freelancers to bring
                their projects to life. Start posting jobs today and connect with experts across various fields.</p>
            <a href="#"
                class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow-lg hover:bg-purple-700 transition">Sign
                up and start posting jobs</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
            <div class="bg-white p-6 rounded-lg shadow">
                <img src="https://s3-alpha.figma.com/hub/file/3476578704/8ccab158-e1af-40ad-9db2-cc7bb790665a-cover.png"
                    alt="UI Design" class="w-30 h-30 mx-auto mb-4">
                <h3 class="text-xl font-bold text-gray-800 mb-2">UI Design</h3>
                <p class="text-gray-600">Explore top UI designers. Craft beautiful interfaces.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2T8bo2aBGIN0a89w1H33mHvM7_ihd2An2WQ&s"
                    alt="Branding" class="w-30 h-30 mx-auto mb-4">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Branding</h3>
                <p class="text-gray-600">Find expert branding specialists. Build your brand identity.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <img src=" data:image/jpeg;base64,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"
                    alt="Branding" class="w-30 h-30 mx-auto mb-4">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Web Development</h3>
                <p class="text-gray-600">Hire skilled web developers. Build robust websites.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxASDxUPEBIQEBUVDxAWFQ8VFRAPDxUQFhEXFxUVFRUYHSggGBolGxUWITEhJykrLi4uFx8zODMsNygtLisBCgoKDg0OGhAQGi0lHyItLS0tLSstMCstLS0vLS0tKy0tLS0tLSstLS0tLS0tLS0tLS0tLS0tKy0tKy0tLS0tLf/AABEIANIA8AMBIgACEQEDEQH/xAAcAAABBAMBAAAAAAAAAAAAAAAAAQIDBAUGBwj/xABEEAACAQMCAgcEBwQIBgMAAAABAgMABBESIQUxBhMiQVFhcQeBkaEUIzJCUrHBFWKSwjNDU3KCstHSJGOis+HwNDVE/8QAGgEAAgMBAQAAAAAAAAAAAAAAAAIBAwQFBv/EAC0RAAICAQIEBAYCAwAAAAAAAAABAhEDBBIhMUFRBRNhoSIjcYGx0UKRMuHx/9oADAMBAAIRAxEAPwDi9FGKXFXUUiUUuKMUUFiUUuKMUUFiUUuKKKCxKTNOoxRQWNzS0tGKKCxKKXFGKKCxKKXFJiigsKKWjFFBYlFLijFRQDc0ZpcUUAJmjNLRQAmaM0tGKACilxQBU0AlFOxRipoiwpaWipIEopaXFSA2ilooASilpNQ8RUAFJSilxQA2inUmKAEopcVmOi3Ry4v7gW9uByy8jf0cafiY/kOZ+JABhsUYrvnCvZJw2JAJxLdPjd2d4Uz+6kZBA9SfWoOOeyOwkQ/RWktHxt2mngJ/eVyW94bbwNLuG2nCsUuKv8b4PPaTtbXCaHXHmrKfsujfeU9x/IgiqOKYUbRinYpcVNBYzFGKfilxRQWMxRin4oxRRFjMUYp+mjTRQWMxRin4o00UFjcUuKdppcVNEWMoopaCRKKWloIG0Ypaa/I+lBJ1P2X+zuO5jF9eqWjJ+pt91DgHHWSY3K5Gy9+MnINditrRIlCRIkSgYCIqxoB5BdqksIIre3ijysaLHHGmSFGybAe4GqM1pcZYx3UY7TjBUPgF3deZ2YCRF9EHPkKbstqjD9KuhVlfIetjWOXHZuo1VZlPdqxjrB5N7iDvXnvjnCZbS5ktZgA8bYyPsspGVdf3WUgj18a9Q2hwDG8yzSKx1Y0KVDHsjSvLbHPfnXH/AG62yi5tpQO08Eit5iOQFf8AuNTR50RLkcxVCeQNTxWTsDgHYZxg7+nnUNSRzsoIBxnv78evdVlFdkOK777HbWC34WsrsqPO5kdm2GjXIkQLcgMROfUnxrggrv8A7FryC44asTKjS2sjqcgFgjuzxsPLtMM+KtSzXAaHM3YX9udhNDkgkDWmSAcEgZ3G3PlVduI2x5TwHcDaSM7nkOfM1aPA7XIbqY+yGAGkae0QTtyz2Rv4bVDJwm3GMQxdlsr2V7LYAyPDZVHuqtUWcTmPtrs4pbSK7jZHaGdYyysrfVSoWAOP3gpH98nvrjmK7D7ZrmCG3js4lRHlkWRwoAPUxKwXPqz7f3WrkgSroRtFM5UzLdFujMt9JoRhGoKgyEFu0x2AGRnx51vHSD2UJFCrwTnUGAYuMhsjmAORyKd7KrCR4sR7M9wxB5ABFXc+mDXTOI8Du5QA0kGB3DWoz4nY1sWPHHbua48zGtTkayqEbfJcDhj+z+47pYD69Yv8pqBugl5425/xv+qV2luilz/yj/ib/bUT9GrofdU+jL+tX+XpH/L3MXna9fw9ji79Cb0fdjPpIv64qCTolfD+oJ9HiY/ANXb7Xht3ExYQhsoy7shxnv51juKSPqVHjERSNV0+I8aI6bFKVRfuvwWPUaiOPdNU+zi172cIKY2O3lyOaAtXeJuGuJWGN5pT7i5qtprE4UzoKXAj00aak00Yo2huI8UYp+KMUbQsr0tFFVFgUUUUEBRirVpJ1Z1Hv+7ty8T/AKVDM+pi3LLE48s0EnpD2c8eg4lw+ISaXmt9CyxtuRIqlUl094YZI7s57xWdbo3Z5z1K56tU5v8AYVQoHPwFeXOEcVuLWYT20rwyAEB1xup5qwOzL5EEbV0K19tV6FxLb20rfjBkiz6rkj4YqtwfQsU0+Z1leCW0biVE0FcnOpiPsad9ROAF7uWwPcMcC9pvSFb2/LRHVDEvVRsOT4JLuPIscDxCg0vSj2hX98pidkhiPOGIFQw8HYksw8sgeVanTRi+bFlJdBKKWlxT0IIKy3RnpBcWFwLm2YBgMMhyY5EJ3Rx3j5jurFYpRU0F0d54V7ZrCRP+IjntnxuAvXxE/usva+KiqnHfbBaqpFnFJO+NmkHUwg+J31n0wPUVxQCngVCwxJeVlrinEZrmZridy8jnJbkAO5VHcoGwFQKtKq1IBWiMTPKR2n2PW+mFD/yZG97y5HyrpPWb1o3s8i6u3x4RQL7wmT+dbbDLlwPOk1Mfj+iX4Nvh2D5G/u2/cymaCDTUbmfAU3raxUaNo45rX+PpmTOnOE8M95NZ7raxXEb51EjLvpAwME77DO3Or8FqVpGPXxUsW19Wc9l4bAftRRH1RD+YrUunPC4EhWSONI260L2AFBUqxOQOfIV2L9ovhdQAOhSVOdmI3FVr+ZHCq6RncndVbf3jzrpSyylGtnucDH5WLJxyPh6M84aaCtd+bgtoxGq2tXHnDF3+eK0/2m9Cra2i+lWqmMB0DxamZMPyK6iSMNgY5YPlWTfUlGSqzq45RyRcoO6OYaaaVqfRTStWOJNlCg0V1r2OdC45E/aVwoftkW8bDKgocNKR3nUMDw0k+GMbdI0pWaJw3oVxO4QSQ2kxUjIdtEKkeK9Yy5HmKq8Y6N3tpg3VvLCCcByA0RPh1ikrnyzXp95E19WXTXgHq9S9ZpJwDpznGds1HNEjoyMFdGDKykB0YZIZWB2O4IIpN7H2I8oE0VuPtN6KLYXQaEEQTBmjXc9W641x5PMDUpB8GxvjNadVqdlbVBRS0VIoYoxS0UAFFGKXFSQAFKBQBT1FMkQ2KoqRRTQKlUVYkVtiqKnhi1MF8SB8TimKK6F7JeD280s0lxEsoTqQgbdQzFixx49hd/OpyZFihufp+SIQeSW1G38Av440ZGbSded84I0gfpWd4dxGJpNnU4Unn7v1qWXg9n/Yr7i4/I1Db8JtxMgjUpnUGwzHKgZ7ycbimnlxZLdNf0dTG9Rhw7KVLh1M4tyvVltQxqAzkYzUP0geI+NSTcOi6sJ2gNRbnvnlWLv+HRohZS2RjAJBBJIHh51kxqDfUFPKle1f2XzcDxrB3t2RllJBLcxscE5rLHgcf9o2e/ZcZqne8CBGBKRvndcjl61filiT5+xm1WPJnjSjX3MQs2dyc+dU+IXPbA/d/M/+KijmrF311mY+WkfIf6101Cmea1GComwcPnJdV8WA+dUfbBcYtCn47mJfciFj81FT9FO3cp5b/KsF7W7nUYI/F7iQ/FVX+asGdbtTGJv8Mjs0033f6/ZzIpUbLVtkqNlq9wL0zCV6Y6C3KRcFsnCu+YIl0oAzGQ51bEj7wbNeaBXXfYv03iiX9mXTCMGQtbysQE1MctEx+6SxJUnmWI8M8ma4HQg+Jv3Ebzh0rCRpJSWUDsiYLpDEBtJGOed+ZG3IkEt+JWMAZY3bBkmJISQqXTtSEFV07ahuNtxW1MB4CqF9PHGjSSMiIoJZ2IVFXG5JOwFVpj0cx9uLKbG3IwSbsFT4p1EmSPL7HyrjFbd7SulYv7odVnqIQyxE5BckjXIQeWcAAeCjxIrUqvgqRTN8RKWiinECjbl8u+lFdI4Tf2KcEtYb+JpYZLu9YtHgXCSRFGTSe4MCyHyfORioboaKs5upFKDXXeMWVvfvFdG2W4l/ZPDmj4bFOtmqxyTXGtw3M9WAi47tWSOVTt0XsngtrcR/SreOfiaNfi5S3NtD9JYiUryl3GM40nRy7QpfMQ/lHHFI5ZFSgV2C24ZazWdpb3Ev1TjhOptSxk4sbkqgb7gZgq+Pa55rTPaDwa2tZYUt43hZomaSFjIVB14Rl1szDIzkE/dB76shNN0VzhSs1VRUqikUVKi1pijNJj0Wum+yzKwufxTMfcsagfMmubItbv0K4yI4zFpPZydQxg6mzyPp8qnJheVKK7r2Nvhc8cdRc30dfU6VLcEc9qfwybMufBG+JIrWP28D3H+FDWS4RfDng9rAH8RFPPTOMXaO/lljlFJNczar+4xpH7gPxrFXVzkovjKnwBz+lVuPcXVZ2j/CFHf+EHu9axDcSUupzgAk9+OWBSYNM9qdBjwp4/qbe97VG+vsIx8EY/KsX+118R8aocS4ihRlBGSMYzk700NK7VoeeGMIN+hj1etenuMyuf32+RxWXEta2j538a6UuB47W4tqSN89nz5lkf8ADET7+78jWq+0iTVeIv4LaP4szMfzFbX7P0xb3MniUT4DP89aT0yfXfzHwcKP8CKv5g1zca36uT7L9DRjs00V3ZrjLUTLVtkqJlrZKJUmaxS4pKWuIbzPcM6Y8St06uG8nRByQkSqB4KHB0jyFVOMcfvLr/5NxNMAchWb6sHxCDCg+eKryWgEYfUMkbr67jB8cb1VFCSJbYtFFFMIFKKBViyWMyoJiyxmROsZRqcR5GvSPHGcUAZDiPRu5gtIL2VVEVxnqyDlhtldYx2dS5Yc8gVitGMMRjOcHGMgHBwe/Brph6cWN1NLA9tLAkstqYZeuMoWS2dRbYhKhYVK5DFSeZ5862CPpXbnjBgM1xcFuKFl64RLb2iwxyq3UOGOQ/L7owd985Te1zRbsXRnH+H8IknMioq/V28lw4YhPqUA1OM8/tD1pl3w5o5HUhX6tsPJGRLED3fWLtj31v0nTa1MLxtLeXbPZ8RVbq4SNZla56vq4AFY9hShJOcAnYY2E3GOm1rNqaOa7gCXNzI1qqfU3ySyKyrOQ4C7DqzqDdnl4UylK+QrjHuc/s+GSyypDHEzSS46tMBC+rlgtgYOOecU42RWOOTsYkaRVRWVpAyEA6kG65yMZ591dMi9okEbtILniFwH4hDOInRYxDb5YPApEhzgEbbKcDbmax9v0tt0WOPr7yRhFxGP9oFM3UbXEkLRyqGkJJCxsp7QODsadSl2EcY1zNCQfr8udTIK6BN08QKot3uI2F9ZvLNpVJbmCKAJLJJpONbso7PeAMnmK07iciPczSRDTG9xM0a404jaQlBju2I2rTibfNUZ8iS5Oyui1sXRqLOrHNnVR6/+tWCRa2zorHvH5zBvgw/0rdiVO+xboI786R0SXorZjYNN66l/20RcNjjmgSNmYF9w2CcKQe4Dzpj3hPfUlhJquQx5RwyN8sfrWFPLtblJvgz009L5cLMLxa31zyP9ZvI33QwwDgcj5ViZI3XJKsB4kEUxoGJJ1rkkn73M79wNQ8xjrFPll/1FdjHHakr9jorEkkqJRNVvh3BprhHljK4WQLgnBJxv8Bj41ic1neiKSIskxyA64XfmQTk48uWT50uqk8eO4viZdTi3UkZHi/Cylh1MaxvIqtqYABiSSdmPr391c8urR4X6uQAHA5HI5A8/fW08K6xZJHIZVORvnJOrI58zjO/nWrcVmYzvkscOQM88d1YI7ozcW7XP7s4XiuCEccZU7d/T7+p0boVHp4cp/tLlj/CdP8lcz4jJrmkk/FLI3uLE/rXU7YdTwyHu02skh9ShP5muVlaXw6O6eSfr+zl6n4YQj6FVlqFlq2y1E610ZRMyZplLSUtecOkSo3ZKnvwR6j/xTKSrNhYzTyCKCOSZzyRFZ2x44HIefKpIK9AraD7O+L6dX0N8eHW2xb+ESZ+Va9d2kkTmKVHidftRurI49VO9CaYNNEVbrw7gvDfo9h9IF4Jb4zL10TxdXGy3bQoTEyZYfZJ7WedaVWy8M6aXEEMMKQ2TG3EnUzyQCW4iLyNIWRmbAOpiRt3CiSb5EwaXMtyezi/Eckn1JEbXQC5kEkiW7sjugCFQOwxAZgTjYGq8fQS+aVoAsRKzQRA68RyPLGZVMTEdpRGC5O2FHupidNLz6MbVjFKCsqiZ1c3CrKxZ9LhgM6mJBIJGdqE6Z3wW0VXRfoZ+pIXc9gIOtye3iMaBy7JI86Epk3Ayg9nlwiy9d22+ja7Ywk6JZhcxwmNhKisP6Udw+0pBIzVVOgV4XCI9pJ2plaRJ1aKOWJNckUrY7Dhcnw2O9Mm6cXjMWUQQkxBB1aSDSBMsoddTt29SLucjAxir/C+n0qys8scCr1d2wjhgREkvJoSglmUt2+e/kTtUpZEHyyrD0GuSC/X2IhEaOLwz/wDBsrSmLAk05yHGkggHJFTzdAb1ZEiH0eR2n6lljlDmKXqzLibbs/VqzbZ2HjtVG96VXEsD2xW3iheKOPqIo+qijVJuuzGoOxL7sTnNW06Z3nWtMDErvdrckhDjrVhaLABJ7BR2BHnzFXJZPQqk8ZZl6CXaHtvbKghMvXtI8cOhZAjbugYEFl2K94xmpLzoi8NrJPLNCrx3CR9UHDBkaIyKyMBuWGCB3jJ25VTvek88wkUrCiyQrEyorgaRKJMjU57RZRv4DFTT9JJ5Y3ikWBlkEOxQko0UXVI8Zz2X0bE7+lXQjl4WUzePoYqNa2vgkMmEESuz6chVUu3idgPOtZQV0joGdErP+GEL8WX/AG1tlPy8cpVZo8NTeR1zIU+lggNHMNxziYfy1lbKZkgupT9pbfSM5G7E4+a1sD8Q86wXEbzRaTynP1l0qjBCnC7+HrWWOaWVU41bX5PRxWRUpvm0al+0G8B8ZP1ao/pT+IPqqH9Ksy36OuljNg92Yz+lUpimexrxjfVpzn3V11XY6cpeohbY+hoteIyqFQOQqtkDuGTv7tzUUp7J/wDe+peCSKtzEXQSjrFBjP2Tk4GfQkHHlSZWtrtWc/UZGpKjJcXNw8RmtXQrGVL9pRgHIAIPPOOVajBM0kyljks65/irfuK8ShjuBw9LdBFKG1EcyTkgkd+4PftWtLaRftKGGJNAE0II55GQSf4a48czcncaVWvp6+vM5HiW7KnJz61Xr6fZm/dLm6u0dR3QRoP8bAflmuYstdC6fzfVEfinVfcqMfzIrQGFbfCYfIb7tnG1r+ZXZFdxULirLVC4rdJGdGi0tFLXlzqFjh1lJPNHBEMvJIqKO7Uxxk+Q5nyFelOi/R+1sIltYSmsqC7Er18rY3dhzxzwOQFcQ9lOn9tWur8UuP73USYrv3Gra2DK8wbLuuGDKqgopxnUwB2J7O5bwIzVeR8aLILhZadMYHjy8zjO3uB+Fa70x6LQ38BikAWRQepnx2437hnvQ96+/YgEV3HCjhFMzBiORmYKyjSAFO++oZwMHAzyrJ8KhtiXmtyzdpkYktpySJDgH+98z50lVxGs80TwsjtG40sjsrL3h1JDD3EEU0Cs909Knit2Uxj6S/LlqwNf/VqrBVrjxRmlwYU4CkFOFOhRQKetNFPFOiGSJU6VClWIxV0SqRMgqxGKhjFWY60xRTIs26ZYDxI/Ot34DdpHr1NpJ0+PIZ/1rTbFcuvr+ldD6P8ARmOe3EzyuhLMAqhcaVOO/vyDTZpwhj+PkdLwucoNyirZOnEUPJgabxZwLKBW05eSV8Hq+4kfe8iKluejkcMbuszNhc4KgZx3ZBrH9L7TV9Hj1Mui1XYRSOMvz3Uc+zVGN45SjsfC/wAL/Z6LFlnlnHcuVmKuAgGfqhvzKqw/6EqnOwxsYTv90SBvmAMVBcWjKdtTjHPQ648txUIat6o1ZJsWc7e+peFXvUydZpV8KQAe4nkR5/61Wnbl76jBpJ1JUzl5snx2jPcR4ioQXnVKZCNJOeW529+DUPQ1hPxaOTTpA1uRz5IVBPxFavc7uT5/kK3D2XRf8TLJ+C2I97sMf5TXNzxjjxyaOZm1k8+RQdUn26rr9zIdOpsmNfEzMfewUf5TWpNWf6YSZuFX8MMY95yx/wAwrXzXV8Pjt00F6X/ZyNS7yyI2qB6meoXNXyK0aLS0lLXlTqliwvHhlSeI6XjkR0bwZWBGfEbcq9PdDeltvxG3EsTBZAB1tuSOsjf071yNm7/XIry1U1rcSRuJIneNxydGaNx6Mu4qJQ3ExntPXUrVpnTTpPbcNhcjSZ5MtHADlmkIADuO5Bgb+CgCuLN064qV0G+uMYxzUN/GBq+dYGWRnYu7M7Mcl2Jd2PiSdyaWOLuNLIugssjMxdyWZmLMx5lmOST5kkmmilZCOYI9QRQK0ooYopwpBV3hPC57mQQ28TzPjOlcYA8WY7KPMkCmIKop4reYvZRxEjJkslP4TJMW+KxEfOtf4/0YvLIj6RFhScLMpEkLHwDDkfI4O3KpjOLdJg4SXQxaVPHUC1MhrREqkWY6sx1UQ1ZQ1piyiSL9nIFYE+ddP4FdabWJR+DP8RLfrXKENZ216QTqqoNBCqAMqc4AwORpc+J5YpI6HhmsxaeT83l0o33iFxqj0Z+0yL8WArA9M4p3vpOrZgqhFABlGwUHuGOZNLwC+eeeBW0/0yscZH2Mt3k9wrW+M9IA11MTEp+vlAPYyQHIHND3AVXCHlTS9Pz/AMO/i1WLJk3rlRMXuFODNg+Bm0n4MRVSTIO5BJ3yGV+fmCapTcULNkJFjbZo4mPL8QUVC82o5wq+SjSvwq/zBsmpXQuyyZNCtVRXqTrMD3VG852SVtsrk5JPmfzroHs2ixb3Uvi0cY9Qur+eueRvXU+gsWnhqn+0uWY+isF/Jaw62Xyvqzl6dXks1fpJLqu5T4Pp/hAX9KxLGpbqbU7P+J3b4sT+tVmau7jWzHGPZI58nuk2I5qBzT3aoXNLJkpGl0opKUV5lHTFpaSnCpICnIcEHwINJQKYguXFyJD2sr4HmPQj9ar4popRTIhj0UkhVGSSAAOZJOAPjXoroxwu24bBHallWRlVpZSCoeQht2fkB2HABPJfj5/4LKqXUEj4CpdW7MTyCLKpb5A16V4jKeuIazMy5ROvHabTo6wYXTnAc8we494ANOd8kW4l1JXvIB/XQjfH9Ig7WM4588d1Up7i1nRomaKZGIjaPIZWLDYDHPyI5EHfaq46kn/6yRdfVtnqowS2uVO3+EgEnc8pPDOIpb5Bplls5EbIIcqMK+NW7HB21Nvjx5DNUpFrZxPpPwc2d5LbZJVWBRjzaJgGQnzwcHzBrHKa232tTK3FCqkZS3hVvJss/wDlda1BDvzxuN98Dz2rp4pXFNmKaptFhGqxG1SXlrEhAEhxpBB0ltXmCNsVXEiDlqPrgfIVojMqlEuo1To9Y5ZKlWWr4zKXA23oXeKl7EXbSDrXJOAGaNlXPvIHvrB3/QfiaSOFAkGtsN1iKWGdiQxGDVIT1Yi41dr9i4nUdwDtpHoDsKzajFKct0HxNGDLsW1kJ6McUXnbufRoG/JqY3B+Irztp/cmr/LWSXpRxAf/AKZD6iNvzWpR0z4gP6xD6xR/oKz+XnXY0eeu7MEYbxftW9wPWGUfpUM1xKBhkZfVWX862henXEBzW2b1jYfkwqwvtAufvW9u3oZU/U1FZ109xvMTX+RpcMjMwUA7nwOPee4V2yFTb8MiU9kpau7DvDFSceuoitJX2gvnJsYmPcTK5APpp3pOJ9LpbqMoRoyRr8SByUY2Cio8rJmlGLjSvjxF3wxptOzF6qjZqaWqNmrvORzUhzNUDtQzVEzVTKQ6RqtKKbS155M6I6lFNpaYgcKUU0GlqSBwpaaDTgaZMgWu4+zP2jQyQpZ3sixTIqokznTHMg2UFjsJOQwftcxuSBw2lqJwU1TJjJxPXjtttvWndMumVrZIwZklmx2LYEFtXcXx9hc75O+22a8+Q3kqroSSRV/Aruqfwg4qJarjgV8WPLNw4It3t5JNK80rankdmZvFic7eA7gO4VEDUeaUGtaZnZMpqRTVfVTw1WKQtFlWqRXqor1IHqxTFaLavUgeqavUgerVMVothqepqor08PVimLRa2pcCq3WU7rKfciKJ9IoGBUHWUmujcgpk5emM1RF6Yz0rmSoj2ao2ao2eoy1VSmMkYGlFNpa4qNwtKDSUtNZAtKKaKdUkCg06mU4UxA4Glpopc01ijhS03NLmmsgfmjNMzS5qbAfmnA1FmlzU2RRKGp4aoNVKGplIiiyHpwequulD0ymRRcElO6yqXWU7rKZZCNpd6ylEtUutpRLTeaRtLglo62qfW0hlqfNDaXGlphkqs0tNMlK8gbSwZKYXqHXTS9K5jUY+loornmoWgUUVKFFFOoopiApwooqSApaKKlEC0ooopkQFFFFSQFFFFABS0UVIAKKKKAAUGlooAQmjNFFAADRmiigAzRmiigAooooA/9k=" alt="App Development"
                    class="w-30 h-30 mx-auto mb-4">
                <h3 class="text-xl font-bold text-gray-800 mb-2">App Development</h3>
                <p class="text-gray-600">Connect with app developers. Create innovative apps.</p>
            </div>
        </div>
    </section>

    <main class="flex flex-col md:flex-row mt-4 shadow-lg rounded-lg overflow-hidden">
        <!-- Left: Image Slider Section -->
        <div class="md:w-1/2 relative overflow-hidden">
            <!-- Slider Container -->
            <div id="slider" class="w-full h-full relative">
                <!-- Replace these IMAGE_URL_# placeholders with your actual image URLs -->
                <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000"
                    src="https://storage.googleapis.com/a1aa/image/d5LWMIZvE1TRnJjDnj40aHV92_ag8qWilw7X-eQ67bs.jpg"
                    alt="Slide 1">
                <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000"
                    src="https://i.pinimg.com/474x/6a/34/d0/6a34d010360f9491540182d22b02dc4e.jpg" alt="Slide 2">
                <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000"
                    src="https://i.pinimg.com/474x/07/9a/33/079a335f1db0691a229d01fa655f7df4.jpg" alt="Slide 3">
            </div>
        </div>

        <!-- Right: Content Section -->
        <div class="md:w-1/2 bg-purple-600 text-white p-10 flex flex-col justify-center">
            <h2 class="text-sm uppercase tracking-widest mb-2">For Talent</h2>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Find Great Work</h1>
            <p class="text-lg mb-6">
                Meet clients you’re excited to work with and take your career or business to new heights.
            </p>

            <!-- Benefit Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white text-purple-600 p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-lg">
                        Opportunities at every stage
                    </h3>
                </div>
                <div class="bg-white text-purple-600 p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-lg">
                        Flexibility in work style
                    </h3>
                </div>
                <div class="bg-white text-purple-600 p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-lg">
                        Diverse earning avenues
                    </h3>
                </div>
            </div>

            <!-- Call-to-Action Button -->
            <button
                class="mt-2 bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Find Opportunities
            </button>
        </div>
    </main>

    <!-- Slider JavaScript -->
    <script>
        // Select all slides within the slider container
        const slides = document.querySelectorAll('#slider .slide');
        let currentSlide = 0;
        const slideInterval = 5000; // 5 seconds per slide

        // Function to display the slide corresponding to the index
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = (i === index) ? '1' : '0';
            });
        }

        // Function to transition to the next slide
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Initialize slider display and start the interval
        showSlide(currentSlide);
        setInterval(nextSlide, slideInterval);
    </script>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 FreelanceHub. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>

{{-- <html>
<head>
    <title>Freelance Connect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="font-roboto bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-blue-600">Freelance Connect</a>
            <div class="space-x-4">
                <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Projects</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Freelancers</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">About</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Contact</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Sign In</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Connect with Top Freelancers and Clients</h1>
            <p class="text-lg mb-8">Find the best projects and freelancers to work with, all in one place.</p>
            <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold">Get Started</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Our Features</h2>
                <p class="text-gray-600">Everything you need to connect and collaborate effectively.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-user-plus text-blue-600 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">User Authentication and Profiles</h3>
                    <p class="text-gray-600">Sign up and sign in for both clients and freelancers.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-search text-blue-600 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Advanced Search and Filters</h3>
                    <p class="text-gray-600">Search for projects or freelancers based on specific criteria.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-project-diagram text-blue-600 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Project Posting</h3>
                    <p class="text-gray-600">Clients can create detailed project listings and freelancers can submit proposals.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-star text-blue-600 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Rating and Reviews</h3>
                    <p class="text-gray-600">Both clients and freelancers can leave ratings and reviews after project completion.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-briefcase text-blue-600 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Portfolio Building</h3>
                    <p class="text-gray-600">Freelancers can display completed projects with ratings and client testimonials.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <i class="fas fa-globe text-blue-600 text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">International Payment System</h3>
                    <p class="text-gray-600">Secure and easy international payments for all projects.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Listings Section -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Latest Projects</h2>
                <p class="text-gray-600">Browse through the latest projects posted by clients.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Website Development</h3>
                    <p class="text-gray-600 mb-4">Looking for a skilled web developer to create a responsive website.</p>
                    <p class="text-gray-600 mb-2"><strong>Budget:</strong> $1000 - $1500</p>
                    <p class="text-gray-600 mb-2"><strong>Deadline:</strong> 2 weeks</p>
                    <a href="#" class="text-blue-600 font-semibold">View Details</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Mobile App Design</h3>
                    <p class="text-gray-600 mb-4">Need a creative designer to design a user-friendly mobile app interface.</p>
                    <p class="text-gray-600 mb-2"><strong>Budget:</strong> $500 - $800</p>
                    <p class="text-gray-600 mb-2"><strong>Deadline:</strong> 1 month</p>
                    <a href="#" class="text-blue-600 font-semibold">View Details</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">SEO Optimization</h3>
                    <p class="text-gray-600 mb-4">Looking for an SEO expert to improve our website's search engine ranking.</p>
                    <p class="text-gray-600 mb-2"><strong>Budget:</strong> $300 - $500</p>
                    <p class="text-gray-600 mb-2"><strong>Deadline:</strong> 1 month</p>
                    <a href="#" class="text-blue-600 font-semibold">View Details</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Content Writing</h3>
                    <p class="text-gray-600 mb-4">Need a professional content writer to create engaging blog posts.</p>
                    <p class="text-gray-600 mb-2"><strong>Budget:</strong> $200 - $400</p>
                    <p class="text-gray-600 mb-2"><strong>Deadline:</strong> 2 weeks</p>
                    <a href="#" class="text-blue-600 font-semibold">View Details</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Graphic Design</h3>
                    <p class="text-gray-600 mb-4">Looking for a talented graphic designer to create marketing materials.</p>
                    <p class="text-gray-600 mb-2"><strong>Budget:</strong> $400 - $600</p>
                    <p class="text-gray-600 mb-2"><strong>Deadline:</strong> 3 weeks</p>
                    <a href="#" class="text-blue-600 font-semibold">View Details</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Social Media Management</h3>
                    <p class="text-gray-600 mb-4">Need a social media expert to manage our social media accounts.</p>
                    <p class="text-gray-600 mb-2"><strong>Budget:</strong> $500 - $700</p>
                    <p class="text-gray-600 mb-2"><strong>Deadline:</strong> 1 month</p>
                    <a href="#" class="text-blue-600 font-semibold">View Details</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-600">&copy; 2023 Freelance Connect. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> --}}
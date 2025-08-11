<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string $requiredRole The role required to access this route (e.g., 'user', 'admin')
     */
    public function handle(Request $request, Closure $next, string $requiredRole): Response
    {
        // 1. Proveravamo da li je korisnik uopste ulogovan.
        // Ako nije, preusmeri ga na login stranicu.
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // OBAVEZNO: Explicitno castujemo ulogovanog korisnika na nas User model.
        // Ovo govori PHP-u i Intephense-u da je $user objekat tipa App\Models\User
        // i da ce imati metode kao sto su isAdmin() i isUser().
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 2. Proveravamo ulogu korisnika u odnosu na zahtevanu ulogu za rutu.
        if ($requiredRole === User::ROLE_USER) {
            // Ruta zahteva ulogu 'user'
            if ($user->isUser()) {
                return $next($request); // Korisnik je 'user', dozvoli pristup.
            } else {
                // Korisnik nije 'user' (npr. administrator).
                // Preusmeri admina na njegov Filament panel ili ga odbij.
                if ($user->isAdmin()) {
                    return redirect()->to('/admin')->with('error', 'Administratori nemaju pristup korisničkim funkcijama.');
                }
                // Ako je neka druga uloga ili uopste nema dozvolu, prikaži gresku 403.
                abort(403, 'Unauthorized. Samo obični korisnici mogu pristupiti ovoj stranici.');
            }
        } elseif ($requiredRole === User::ROLE_ADMIN) {
            // Ruta zahteva ulogu 'admin'
            if ($user->isAdmin()) {
                return $next($request); // Korisnik je 'admin', dozvoli pristup.
            } else {
                // Korisnik nije 'admin'.
                abort(403, 'Unauthorized. Samo administratori mogu pristupiti ovoj stranici.');
            }
        }

        // Ako dođe do ovde, znači da je $requiredRole nepoznata ili nema poklapanja.
        // U produkciji, ovo ne bi trebalo da se desi ako su uloge dobro definisane u routes/web.php.
        abort(403, 'Unauthorized. Nepoznata zahtevana uloga.');
    }
}

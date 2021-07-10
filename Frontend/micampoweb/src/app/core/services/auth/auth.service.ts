import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { tap } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { StorageService } from '../storage/storage.service';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(
    private http: HttpClient,
    private storageService: StorageService) { }

  iniciarSesion(usu_email: string, usu_pass: string) {
    return this.http.post<any>(`${environment.urlApi}${'sesion.php'}`, {usu_email, usu_pass})
    .pipe(tap((data) => {console.log(data); }));
  }

  cerrarSesion(ses_token) {
    return this.http.put<any>(`${environment.urlApi}${'sesion.php'}`, {ses_token})
    .pipe(tap((data) => {
      console.log(data);
      if (data.estado) {
        this.storageService.deleteUsuario();
      }
    }));
  }
}

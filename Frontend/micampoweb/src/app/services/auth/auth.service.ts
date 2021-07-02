import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) { }

  iniciarSesion(usu_email: string, usu_pass: string) {
    return this.http.post<any>(`${environment.urlApi}${'sesion.php'}`, {usu_email, usu_pass});
  }

  cerrarSesion(jwt) {
    return this.http.post(`${environment.urlApi}${'sesion.php'}`, {jwt});
  }
}

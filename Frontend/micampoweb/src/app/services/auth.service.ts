import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Url } from '../modelo/url.class';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) { }

  private url: Url = new Url;

  iniciarSesion(usu_usuario: string, usu_pass: string) {
    return this.http.post<any>(`${this.url.url_server}${'sesion.php'}`, {'usu_email': usu_usuario, 'usu_pass': usu_pass})
  }
}

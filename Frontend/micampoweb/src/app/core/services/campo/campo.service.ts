import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

// rxjs
import { Observable } from 'rxjs';

// Libs
import { Campo } from '../../modelo/campo.class';
import { environment } from 'src/environments/environment';
import { ApisServices } from '../../modelo/apisServices.enum';

@Injectable({
  providedIn: 'root'
})
export class CampoService {

  constructor(
    private http: HttpClient
  ) { }

  public getCampos(ses_token: string): Observable<Campo[]>  {
    const headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization' : 'Bearer ' + `${ses_token}`
    });
    const params: HttpParams = new HttpParams()
    .set('ses_token', ses_token.toString());

    return this.http.get<Campo[]>(environment.urlApi + `${ApisServices.campo}`, {params,  headers});
  }
}

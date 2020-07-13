import { Component, OnInit } from '@angular/core';
import { FormControl, Validators, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-registro',
  templateUrl: './registro.component.html',
  styleUrls: ['./registro.component.css']
})
export class RegistroComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  formRegistro = new FormGroup({
    inputNombre : new FormControl('', Validators.compose([Validators.required])),
    inputEmail : new FormControl('', Validators.compose([Validators.required, Validators.email])),
    imputPassword: new FormControl('', Validators.compose([Validators.required, Validators.minLength(8), Validators.maxLength(50)])),
    inputRepetirPassword: new FormControl('', Validators. compose([Validators.required, Validators.minLength(8), Validators.maxLength(50)])),
    inputTelefono : new FormControl('', Validators.compose([Validators.required, Validators.pattern("[1-9]*[1-9][0-9]*$")])),
    inputLocalidad: new FormControl('', Validators.compose([Validators.required]))

    // pattern="0+\.[0-9]*[1-9][0-9]*$" onkeypress="return event.charCode >= 48 && event.charCode <= 57" 

  });

  registrarUsuario(){
    console.log(this.formRegistro);
  }



}

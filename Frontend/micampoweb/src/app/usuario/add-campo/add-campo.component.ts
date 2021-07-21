import { Component, Inject, OnInit } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-add-campo',
  templateUrl: './add-campo.component.html',
  styleUrls: ['./add-campo.component.scss']
})
export class AddCampoComponent implements OnInit {

  constructor(
    public dialog: MatDialogRef<AddCampoComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) { }

  ngOnInit() {

  }

}

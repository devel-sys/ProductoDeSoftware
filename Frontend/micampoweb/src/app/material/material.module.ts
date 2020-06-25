import { NgModule } from '@angular/core';

import {MatButtonModule, 
  MatButtonToggleModule,
  MatExpansionModule,
  MatIconModule,
  MatBadgeModule,
  MatProgressBarModule,
  MatToolbarModule,
  MatSidenavModule,
  MatMenuModule,
  MatListModule,
  MatDividerModule,
  MatGridListModule,
  MatSelectModule,
  MatFormFieldModule,
  MatInputModule,
  MatAutocompleteModule,
  MatSnackBarModule,
  MatDialogModule,
  MatSlideToggleModule,
  MatSliderModule,
  MatCardModule,
  MatTableModule,
  MatDatepickerModule,
  MatProgressSpinnerModule,
  MatPaginatorModule

}   from '@angular/material';

const  MaterialComponents  =  [
  MatButtonModule,
  MatButtonToggleModule,
  MatIconModule,
  MatBadgeModule,
  MatProgressBarModule,
  MatToolbarModule,
  MatSidenavModule,
  MatMenuModule,
  MatListModule,
  MatDividerModule,
  MatGridListModule,
  MatExpansionModule,
  MatCardModule,
  MatSelectModule,
  MatFormFieldModule,
  MatInputModule,
  MatAutocompleteModule,
  MatSnackBarModule,
  MatDialogModule,
  MatSlideToggleModule,
  MatSliderModule,
  MatTableModule,
  MatDatepickerModule,
  MatProgressSpinnerModule,
  MatPaginatorModule
]

@NgModule({
  declarations: [],
  imports: [MaterialComponents
  ],
  exports: [
    MaterialComponents
   ]
})

export class MaterialModule { }

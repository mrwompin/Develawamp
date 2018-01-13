Calendar Column
---------------
The calendar column is an extension of the DatagridViewColumn that utilyzes three classes inheritting from the DatagridViewColumn, DataGridviewTextboxCell, and the DateTimePicker as well as incorporating the IDataGridViewEditingControl interface as a means of embedding the DateTimePicker class in the form of the CalendarEditingControl.

#### The Calendar Column

##### The Constructor

![Calendar Column][CalendarColumn]

The CalendarColumn class inherits from the DatagridViewColumn. This control will ultimately be available under the DatagridView control using the add a column feature. The class can also be hard coded in later. The public CalendarColumn is the entry point for the class, the colon base(new CalendarCcell()) runs the base class constructor (DatagridViewColumn) and then adds the CalendarCell() class as the cell template (we will build the CalendarCell later).

##### CellTemplate Override

![Calendar Column CellTemplate Overide][CellTemplate]

Overides the CellTemplate property on the DatagridViewColumn. Causes any other CellTemplate setting other than the CalendarCell to throw an error.

#### The Calendar Cell

##### The Constructor

![Calendar Cell][CalendarCell]

The CalendarCell class inherits from the DatagridViewTextrBoxCell. Like the CalendarColumn, the CalendarCell constructor calls the base constructor as well. Then the Format for the custom cell is set to short date.

#### InitializeEditingControl Override

![Initialize Editing Control][InitializeEditingControl]

When editing is initiated cell information is sent to the editing control. If the cell value is null, the CalendarEditingControl default value is set to today.

#### Additional Properties

![Additional Properties][AdditionalProperties]

These properites override basic information about the class.

#### The CalendarEditingControl

Will be called when the user starts to edit a cell in a calendar column. Inherits from the DateTimePicker and uses the IDatagridViewEditingControl inorder to apply DateTimePicker edits to the cell.

##### Properties

![Calendar Editing Control Properties][CalendarEditingControlProperties]

Properties needed for class

#### The Constructor
![Calendar Editing Control Constructor][CalendarEditingControlConstructor]

Sets the editing format to Short Date

#### Interface Implemenatons

The following sections of code are the required implementations for the IDatagridViewEditingControl. These are the parts of the code that need to be defined so that when the DatagridView that parents our CalendarColumn is able to apply the user's edits.

##### Editing Control Formatted Value

![Editing Control Formatted Value][EditingControlFormattedValue]

Handles getting and setting the value of the Editing Control, returns the value as a short date, as well as attempts to store it as a short date. If the value cannot be stored as a short date, the value is set to todays date. GetEditingControlFormattedValue handles retrieving the formatted value, and also has it's own set of error handling.

##### Apply Cell Styling to Editing Control

![Apply Cell Styling to Editing Control][ApplyCellStylingToEditingControl]

Sets the look of the CalendarEditingControl to match the parent DatagridView

##### Editing Control Row Index
![Editing Control Row Index][EditingControlRowIndex]

Property to store the cell index that is being editted. 

##### Editing Control Wants Input Key

![Editing Control Wants Input Key][EditingControlWantsInputKey]

Defines how to handle the editing control needing a key input.

##### Prepare Editing Control for Edit

No preparation is needed prior to edit

##### Misc. Implemenations

![Prepare Editing Control for Edit][PrepareEditingControlforEdit]

![Repositon Editing Control on Value Change][RepositionEditingControlOnValueChange]

PrepareEditingControlforEdit does not need set as there is no preparation needed before editing can begin. RepositionEditingControlOnValueChange is set to return false so the control won't reposition when the value changes. We have the EditingControlDatagridView set to return our class' dataGridView property. EditingControlValueChanged boolean is set to return to return the our class' valueChanged boolean. Finally the EditingPanelCursor is set to return the default DateTimePicker cursor.

##### On Value Changed

![On Value Changed][OnValueChanged]

The last bit of code we need is an override for our base class void, OnValueChanged. This handles when the value changes by setting our valueChanged boolean to true, then notify the parent DatagridView, before calling the base OnValueChanged sending the eventargs.

Demo
----

Go to form1 constructor and add the following code.

![Demo][Demo]

Run the program. Notice what happens when you click on the Vacation Start and Vacation End cells.

[CalendarColumn]: img/CalendarColumn.png
[CellTemplate]: img/CellTemplate.png
[CalendarCell]: img/CalendarCell.png
[InitializeEditingControl]: img/InitializeEditingControl.png
[AdditionalProperties]: img/AdditionalProperties.png
[CalendarEditingControlProperties]: img/CalendarEditingControlProperties.png
[CalendarEditingControlConstructor]: img/CalendarEditingControlConstructor.png
[EditingControlFormattedValue]: img/EditingControlFormattedValue.png
[ApplyCellStylingToEditingControl]: img/EditingControlFormattedValue.png
[EditingControlRowIndex]: img/EditingControlRowIndex.png
[EditingControlWantsInputKey]: img/EditingControlWantsInputKey.png
[PrepareEditingControlforEdit]: img/PrepareEditingControlForEdit.png
[RepositionEditingControlOnValueChange]: img/RepositionEditingControlOnValueChange.png
[OnValueChanged]: img/OnValueChanged.png
[Demo]: img/demo.png

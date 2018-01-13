lternating Row Style
---------------------
Being able to apply alternating style may improve the readabily of the DataGridView control.

###### Example 1

```{.cs}
this.dataGridView1.RowsDefaultCellStyle.BackColor = Color.Biscue;
this.dataGridView1.AlternatingRowsDefaultCellStyle.BackColor = Color.Beige;
```
The first line in the code above applies a default color to all rows, then alternating rows have their colors overridden by the second line.

###### Output:

![][Example1]

[Example1]: img/Example1.png "Example1 Output"


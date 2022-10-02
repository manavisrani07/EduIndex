from http.client import OK
import random
import time,sys
from os import system, name
import tkinter as tk
from tkinter import *
from tkinter.font import Font
from tkinter import messagebox
import mysql.connector

def Ok():
    e1=textbox1.get("1.0","end-1c")
    e2=textbox2.get("1.0","end-1c")
    e3=textbox3.get("1.0","end-1c")
    e4=textbox4.get("1.0","end-1c")
    e5=textbox5.get("1.0","end-1c")
    e6=textbox6.get("1.0","end-1c")
    e7=textbox7.get("1.0","end-1c")
    e8=textbox8.get("1.0","end-1c")
    college = e1
    state = e2
    category = e3
    intake = e4
    passouts = e5
    total_placed = e6
    avg_sal = e7
    unemployed = e8

    mysqldb=mysql.connector.connect(host="localhost",user="root",password="",database="eduindex")
    mycursor=mysqldb.cursor()

    try:
       sql = "INSERT INTO testing (College, State, Category, Intake, Passouts,  Total_Placed, Average_Sal,unemployed) VALUES (%s, %s, %s, %s, %s, %s, %s,%s)"
       val = (college, state, category, intake, passouts, total_placed, avg_sal,unemployed)
       mycursor.execute(sql, val)
       mysqldb.commit()
       messagebox.showinfo("information", "Record inserted successfully...")

    except Exception as e:
       print(e)
       mysqldb.rollback()
       mysqldb.close()






root=tk.Tk()
root.geometry("1280x720")
root.title("Data Input")
root.grid()
bg = PhotoImage(file = "background2.png")


myFont=Font(family="Calibri Bold", size=40)
myFont1=Font(family="Calibri Bold", size=30)
inputFont=Font(family="Calibri Bold", size=30)

label1 = Label( root, image = bg)
label1.place(x = 0, y = 0)

label2 = Label( root, text = "Add Data",font = myFont,bg="#202652",fg="#e2f3fc")
label2.place(x = 530, y = 40)

label3=Label(root,text= "College", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label3.place(x=100,y=200)

label4=Label(root,text= "State", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label4.place(x=100,y=250)

label5=Label(root,text= "Category", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label5.place(x=100,y=300)

label6=Label(root,text= "Total Students", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label6.place(x=100,y=350)

label7=Label(root,text= "Graduated Students", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label7.place(x=100,y=400)

label8=Label(root,text= "Employed", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label8.place(x=100,y=450)

label9=Label(root,text= "Average Salary", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label9.place(x=100,y=500)

label10=Label(root,text= "Unemployed", font = myFont1,fg="#3f51ac",bg="#e2f3fc")
label10.place(x=100,y=550)

textbox1=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox1. configure(font=inputFont)
textbox1.place(x=500,y=200)

textbox2=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox2. configure(font=inputFont)
textbox2.place(x=500,y=250)

textbox3=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox3. configure(font=inputFont)
textbox3.place(x=500,y=300)

textbox4=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox4. configure(font=inputFont)
textbox4.place(x=500,y=350)

textbox5=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox5. configure(font=inputFont)
textbox5.place(x=500,y=400)

textbox6=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox6. configure(font=inputFont)
textbox6.place(x=500,y=450)

textbox7=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox7. configure(font=inputFont)
textbox7.place(x=500,y=500)

textbox8=Text(root, height = 1,width = 30,fg="#202652",bg="#e2f3fc",bd=0)
textbox8. configure(font=inputFont)
textbox8.place(x=500,y=550)

Submit=Button(root,text="Submit",bd=0,bg="#e2f3fc",height=72,command=lambda:Ok())
button=PhotoImage(file="Button.png")
Submit.config(image=button)
Submit.place(x=400,y=600)

Exit=Button(root,text="Exit",bd=0,bg="#e2f3fc",height=72,command=lambda:root.destroy())
ExitButton=PhotoImage(file="Exit.png")
Exit.config(image=ExitButton)
Exit.place(x=700,y=600)

root.mainloop()
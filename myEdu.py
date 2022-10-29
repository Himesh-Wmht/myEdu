import tkinter as tk
import pickle
from tkinter import ttk
from tkinter import messagebox
from tkinter.messagebox import showinfo
import pandas as pd
from tkinter import *
from tabulate import tabulate
import sklearn
import catboost

root = tk.Tk()
root.geometry("900x550")
root.title("School Enrollment churn prediction")
bg = PhotoImage(file="C:/xampp/xampp/htdocs/Finale/images/bglogin.png")
w = Label(root, text='WELCOME TO myEdu PREDICTION')
w.pack()
# Create Canvas
canvas1 = Canvas(root, width=400,
                 height=400)

canvas1.pack(fill="both", expand=True)

# Display image
canvas1.create_image(0, 0, image=bg,
                     anchor="nw")

cols = ['birth certificate', 'pass book', 'property own by parents', 'own by anyother', 'electricity or water bill',
        'electrol register in 5 yr', 'residence 5-10Km', 'residence more than 10', 'past pupil of school',
        'brothers/sisters in school', 'child of school staff', 'total mark', 'Churn']

# id = tk.StringVar()
birth_certificate = tk.StringVar()
pass_book = tk.StringVar()
property_own_by_parents = tk.StringVar()
own_by_anyother = tk.StringVar()
electricity_or_water_bill = tk.StringVar()
electrol_register_in_5_yr = tk.StringVar()
residence_5_10Km = tk.StringVar()
residence_more_than_10 = tk.StringVar()
past_pupil_of_school = tk.StringVar()
brothers_sisters_in_school = tk.StringVar()
child_of_school_staff = tk.StringVar()
total_mark = tk.StringVar()
Churn = tk.StringVar()

model = pickle.load(open('C:/Users/Himesh Thiloshana/Desktop/Final Project/ModelAI1.pkl', 'rb'))


def on_predict():
    df = pd.DataFrame(columns=cols)
    df['birth certificate'] = [float(birth_certificate.get())]
    df['pass book'] = [float(pass_book.get())]
    df['property own by parents'] = [float(property_own_by_parents.get())]
    df['own by anyother'] = [float(own_by_anyother.get())]
    df['electricity or water bill'] = [float(electricity_or_water_bill.get())]
    df['electrol register in 5 yr'] = [float(electrol_register_in_5_yr.get())]
    df['residence 5-10Km'] = [float(residence_5_10Km.get())]
    df['residence more than 10'] = [float(residence_more_than_10.get())]
    df['past pupil of school'] = [float(past_pupil_of_school.get())]
    df['brothers/sisters in school'] = [float(brothers_sisters_in_school.get())]
    df['child of school staff'] = [float(child_of_school_staff.get())]
    df['total mark'] = [float(total_mark.get())]

    pred = model.predict(df)
    label = "Churn(Requests can be made) " if pred[0] == 1 else "Not Churning(Requests cannot be made)"
    showinfo(title="Prediction", message="Prediction : {}".format(label))


birth_certificate = ttk.Label(root, text="Birth Certificate :")
pass_book = ttk.Label(root, text="Pass Book: ")
property_own_by_parents = ttk.Label(root, text="Property own by parents : ")
own_by_anyother = ttk.Label(root, text="own_by_anyother : ")
electricity_or_water_bill = ttk.Label(root, text="Electricity or Water Bill : ")
electrol_register_in_5_yr = ttk.Label(root, text="electrol_register_in_5_yr: ")
residence_5_10Km = ttk.Label(root, text="Residence 5-10Km :")
residence_more_than_10 = ttk.Label(root, text="Residence more the 10Km : ")
past_pupil_of_school = ttk.Label(root, text="Past pupil os School : ")
brothers_sisters_in_school = ttk.Label(root, text="Brothers/Sisters are studying : ")
child_of_school_staff = ttk.Label(root, text="Child of School staff : ")
total_mark = ttk.Label(root, text="Total Marks : ")

birth_certificate.place(x=300, y=90)
pass_book.place(x=300, y=120)
property_own_by_parents.place(x=300, y=150)
own_by_anyother.place(x=300, y=180)
electricity_or_water_bill.place(x=300, y=210)
electrol_register_in_5_yr.place(x=300, y=240)
residence_5_10Km.place(x=300, y=270)
residence_more_than_10.place(x=300, y=300)
past_pupil_of_school.place(x=300, y=330)
brothers_sisters_in_school.place(x=300, y=360)
child_of_school_staff.place(x=300, y=390)
total_mark.place(x=300, y=420)

birth_certificate = ttk.Entry(root, textvariable=birth_certificate, width=30)
pass_book = ttk.Entry(root, textvariable=pass_book, width=30)
property_own_by_parents = ttk.Entry(root, textvariable=property_own_by_parents, width=30)
own_by_anyother = ttk.Entry(root, textvariable=own_by_anyother, width=30)
electricity_or_water_bill = ttk.Entry(root, textvariable=electricity_or_water_bill, width=30)
electrol_register_in_5_yr = ttk.Entry(root, textvariable=electrol_register_in_5_yr, width=30)
residence_5_10Km = ttk.Entry(root, textvariable=residence_5_10Km, width=30)
residence_more_than_10 = ttk.Entry(root, textvariable=residence_more_than_10, width=30)
past_pupil_of_school = ttk.Entry(root, textvariable=past_pupil_of_school, width=30)
brothers_sisters_in_school = ttk.Entry(root, textvariable=brothers_sisters_in_school, width=30)
child_of_school_staff = ttk.Entry(root, textvariable=child_of_school_staff, width=30)
total_mark = ttk.Entry(root, textvariable=total_mark, width=30)


def final_sum():
    final_sum = (float(birth_certificate.get()) + float(pass_book.get()) + float(property_own_by_parents.get()) + float(
        own_by_anyother.get()) + float(electricity_or_water_bill.get()) + float(electrol_register_in_5_yr.get()) + float(
        residence_5_10Km.get()) + float(residence_more_than_10.get()) + float(past_pupil_of_school.get()) + float(
        brothers_sisters_in_school.get()) + float(child_of_school_staff.get()))
    #return birth_certificate+pass_book+property_own_by_parents+own_by_anyother+electricity_or_water_bill+electrol_register_in_5_yr+residence_5_10Km+residence_more_than_10+past_pupil_of_school+brothers_sisters_in_school+child_of_school_staff
    #print(final_sum)
    total_mark.insert(11, final_sum)
    #total_mark.set(final_sum)


# id_ent.place(x=200, y=60)
birth_certificate.place(x=500, y=90)
pass_book.place(x=500, y=120)
property_own_by_parents.place(x=500, y=150)
own_by_anyother.place(x=500, y=180)
electricity_or_water_bill.place(x=500, y=210)
electrol_register_in_5_yr.place(x=500, y=240)
residence_5_10Km.place(x=500, y=270)
residence_more_than_10.place(x=500, y=300)
past_pupil_of_school.place(x=500, y=330)
brothers_sisters_in_school.place(x=500, y=360)
child_of_school_staff.place(x=500, y=390)
total_mark.place(x=500, y=420)

# Python program to create a table

from tkinter import *
# Create an instance of tkinter frame
win = Tk()

# Set the geometry of tkinter frame without specifying width and height
x = 500
y = 300
win.geometry("+%d+%d" % (x, y))
win.title("User Manual")
class Table:

    def __init__(self, win):
        win['bg'] = '#AC99F2'
        # code for creating table
        for i in range(total_rows):
            for j in range(total_columns):
                self.e = Entry(win, width=20, fg='blue',
                               font=('Arial', 12, 'bold'))

                self.e.grid(row=i, column=j)
                self.e.insert(END, lst[i][j])


# take the data
lst = [('Id', 'Name','Not Provide', 'Provide',),
       (1, 'student birth certificate',0, 2),
       (2, 'student pass book',0, 2),
       (3, 'property own by parents', 0, 2),
       (4, 'property own by others', 0, 1),
       (5, 'Electricity or Water Bill', 0, 1),
       (6, 'Electrol Register in 5yr', 0, 1),
       (7, 'residence in 5-10KM',0, 2),
       (8, 'Residence more 10KM',0, 3),
       (9, 'past pupil of school',0, 3),
       (10, 'Brothers/Sisters are studying',0, 4),
       (11, 'student of school staff',0, 5),
       (12, 'selected mark',0, 22),
       (13, 'Highest mark',0, 26)]

# find total number of rows and
# columns in list
total_rows = len(lst)
total_columns = len(lst[0])

# create root window

t = Table(win)

submit_btn = ttk.Button(root, text="Predict", command=on_predict)
submit_btn2 = ttk.Button(root, text="Load", command=final_sum)
submit_btn.place(x=400, y=460)
submit_btn2.place(x=500, y=460)

root.mainloop()

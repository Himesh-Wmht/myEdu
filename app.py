from __future__ import print_function
import sys
#from __future__import print_function
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
#import seaborn as sns
from sklearn.metrics import classification_report
from sklearn.metrics import confusion_matrix
from sklearn.metrics import cohen_kappa_score
from sklearn import metrics
from sklearn import tree
import pickle
import warnings
warnings.filterwarnings('ignore')

with open('ModelAI1','rb') as f:
    fm = pickle.load(f)
    data = np.array([[sys.argv[1], sys.argv[2],sys.argv[3],
     sys.argv[4],sys.argv[5], sys.argv[6],sys.argv[7], sys.argv[8],sys.argv[9], sys.argv[10],
     sys.argv[11], sys.argv[12]]])
    prediction = fm.predict(data)
    print(prediction)
    


from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from models import Base, User

# Подеси своју MySQL конекцију
DATABASE_URL = "mysql+mysqlconnector://root:linuxar92@localhost/pajton"

# Креирамо engine
engine = create_engine(DATABASE_URL, echo=True)

# Креирање табела ако не постоје
Base.metadata.create_all(engine)

# Сесија
Session = sessionmaker(bind=engine)
session = Session()

# 1. Убацивање новог корисника
novi = User(name="Marko", email="marko@example.com")
session.add(novi)
session.commit()

# 2. Читање свих корисника
korisnici = session.query(User).all()
for k in korisnici:
    print(k)

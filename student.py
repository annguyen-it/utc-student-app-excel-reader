class Student:
    def __init__(self, ID_Student, Student_Name, ID_Class, DoB) -> None:
        self.ID_Student = ID_Student
        self.Student_Name = Student_Name
        self.ID_Class = ID_Class
        self.DoB = DoB

    def __eq__(self, other: object) -> bool:
        if isinstance(other, Student):
            return self.ID_Student == other.ID_Student

        return False

    def __ne__(self, other: object) -> bool:
        return not self.__eq__(other)

    def __str__(self) -> str:
        return (
            "("
            + ", ".join([self.ID_Student, self.Student_Name, self.ID_Class, self.DoB])
            + ")"
        )

    def __repr__(self) -> str:
        return (
            "("
            + ", ".join([self.ID_Student, self.Student_Name, self.ID_Class, self.DoB])
            + ")"
        )

    def __hash__(self) -> int:
        return hash(self.ID_Student)

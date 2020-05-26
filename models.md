This is a list of all the models we have in the application. These models interact with their associated table. 

1. [Attachment](#attachment) 
2. [College](#college)
3. [Programmes](#programmes)
4. [Course](#course)



<a name="attachment"></a>
`Attachment` : Many resources in the application have attached file(s) with them. This model has/implements? functions to find the related resource. 

<a name="college"></a>
`College` : The office of the department of computer science overlooks many a procedures related to computer science examinations conducted at the UG level colleges affiliated to DU. Each college has information related to it, more importantly the [programmes](#programmes) it offers in computer science.

<a name="Programmes"></a>
`Programmes` : Each [college](#college) affiliated to DU offers a different list of programmes in computer science. Examples of programmes being BSc(H) CS, BSc(programme) CS etc. Each programme has a different list of [courses](#course)
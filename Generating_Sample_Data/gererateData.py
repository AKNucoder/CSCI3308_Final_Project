
import sys #cmd line arguments
import random #random num generations

#Entry table
def entryTable():

	userIdPosters = parseFile(sys.argv[2],"\n") #List of users who have posted
	titles = parseFile(sys.argv[3],"\n")        #list of entry titles
	#postDates = parseFile(sys.argv[5],"\n")     #List of entry post dates
	text = parseFile(sys.argv[4],"\n")          #list of entry titles
	tags = parseFile(sys.argv[5],"\n")  	    #List of tags for each post
	prices = parseFile(sys.argv[6],"\n")  	    #List of prices for each post
	eventDates = parseFile(sys.argv[7],"\n")    #List of events

	numRows = min( [len(userIdPosters),len(titles),len(tags),len(prices),len(text),len(eventDates)] ) #Ensure rows all have data for each attribute


	i = 0
	entryTableRows = []
	while i < numRows:
		endingSymbol = ","
		if (i == numRows - 1):
			endingSymbol = ';'
		#entryTableRows.append( "(%i,%s,'%s','%s','%s',%s)%s" % ( (i + 1),userIdPosters[i],titles[i],text[i],tags[i],prices[i],endingSymbol) )
		entryTableRows.append( "(%i,%s,'%s','%s','%s','%s',%s)%s" % ( (i + 1),userIdPosters[i],titles[i],text[i],eventDates[i],tags[i],prices[i],endingSymbol) )
		i = i + 1
	return entryTableRows

#Vehicle Table, collect data
def vehicleTable():

	userIdDrivers = parseFile(sys.argv[2],"\n")#List of users who are drivers
	makeList = parseFile(sys.argv[3],"\n")     #list of car makers
	modelList = parseFile(sys.argv[4],"\n")    #List of car models
	colorList = parseFile(sys.argv[5],"\n")    #List of colors
	
	numRows = min( [len(userIdDrivers),len(makeList),len(modelList),len(colorList)] ) #None of these fields can be null, therefore same row size

	i = 0
	vehicleTableRows = []
	while i < numRows:
		endingSymbol = ","
		if (i == numRows - 1):
			endingSymbol = ';'
		vehicleTableRows.append( "(%i,%s,'%s','%s','%s',%i)%s" % ( (i+1),userIdDrivers[i],makeList[i],modelList[i],colorList[i],int(random.randrange(4,9)),endingSymbol) )

		i = i + 1
	return vehicleTableRows

#Contact Table, collect data
def contactTable():

	maxUserId = int(sys.argv[2]) #max userid given by user
	citiesList = parseFile(sys.argv[3],"\n")   #list of cities put into list
	zipsList = parseFile(sys.argv[4],"\n")     #Zip code list
	
	numRows = min( [len(citiesList),len(zipsList), maxUserId] ) #None of these fields can be null, therefore same row size

	i = 0
	contactTableRows = []
	while i < numRows:
		endingSymbol = ","
		if (i == numRows - 1):
			endingSymbol = ';'
		contactTableRows.append( "(%i,'%s','%s','%s','%s')%s" % ( (i + 1 ), citiesList[i],'CO',zipsList[i],("303%s" %(random.randrange(1000000,9999999)) ),endingSymbol ) )

		i = i + 1
	return contactTableRows

#Profile Table, collect data
def profileTable():
	fullNames = parseFile(sys.argv[2],"\n") #retrieve full names

	emailDomains = parseFile(sys.argv[4],"\n") 	   #retrieve email domains
	emailNames = parseFile(sys.argv[3],"\n") 	   # retrieve email names
	emails = createEmails(emailDomains,emailNames) #combine email names and domains with @

	ps = parseFile(sys.argv[5],"\n") 		#retrieve passwords list
	userName = parseFile(sys.argv[6],"\n")  #user names list

	
	numRows = min( [len(fullNames),len(emails),len(ps),len(userName)] ) #None of these fields can be null, therefore same row size

	i = 0
	profileTableRows = []
	while i < numRows:
		endingSymbol = ","
		if (i == numRows - 1):
			endingSymbol = ';'
		isDriver = random.randrange(0,2)
		profileTableRows.append( "(%i,'%s','%s','%s','%s',%i,%i)%s" % ( (i+1), fullNames[i],emails[i],ps[i],userName[i],isDriver,random.randrange(0,10),endingSymbol ) ) 
		i = i + 1
	return profileTableRows

#combine names and domains to make an email address.
def createEmails(domains,names):
	i = 0
	email = []
	while (i<len(names)):
		email.append( "%s@%s" %(names[i], domains[ random.randrange( 0,len(domains) ) ]) )
		i = i + 1
	return email

#Parse file by each line and return list of contents of file
def parseFile(fileName,delimeter):
	file=open(fileName,"r")
	line=file.readlines

	dataList=[]
	returnValues = []

	for line in file:
		dataList=line.split(delimeter)
		returnValues.append( ( (' '.join(dataList) ).rstrip() ).lstrip() ) 

	file.close()
	return returnValues

def main():
	#Tell user how to input data
	if len(sys.argv) < 2:
		print("\nError: Please Type in: generateData.py [Insert Type]")
		print("Insert Types:")
		print("  a : Insert Data for all tables.")
		print("  c : Insert data for user contact table.")
		print("  p : Insert data for user profile table.")
		print("  v : Insert data for user vehicle table.")
		print("  e : Insert data for user entry table.")
	
	else:
		#Make insert statements for each table depending on user input
		insertType = sys.argv[1];
		tableName = " "
		insertCommand = " "
		tableRows = []

		#profile table
		if insertType == 'p' and len(sys.argv) <=5:
			print("\nError: Missing File Inputs. Please Enter:\ngenerateData.py p [Full Names List] [Email Names List] [Email Domains List] [Passwords List] [User Names List]")
		elif insertType == 'p':
			tableRows = profileTable()
			insertCommand = "INSERT INTO `user_profile` (`userId`,`fullName`, `email`, `ps`,`userName`,`isDriver`,`avatarCode`) VALUES "
			tableName = "Profile"

		#contact tables
		elif insertType == 'c' and len(sys.argv) <=3:
			print("\nError: Missing File Inputs. Please Enter:\ngenerateData.py c [max User Id] [Cities List] [Zip Codes List]")
		elif insertType == 'c':
			tableRows = contactTable()
			insertCommand = "INSERT INTO `user_contact` (`userId`, `city`, `state`,`zipCode`,`phone`) VALUES"
			tableName = "Contact"

		#vehicle tables
		elif insertType == 'v' and len(sys.argv) <=5:
			print("\nError: Missing File Inputs. Please Enter:\ngenerateData.py v [List of User Ids of Drivers] [Car Make List] [Car Models List] [Colors List]")
		elif insertType == 'v':
			tableRows = vehicleTable()
			insertCommand = "INSERT INTO `user_vehicle` (`carId`, `userId`, `make`,`model`,`color`,`seats`) VALUES"
			tableName = "Vehicle"

		#Entry table
		elif insertType == 'e' and len(sys.argv) <=6:
			print("\nError: Missing File Inputs. Please Enter:\ngenerateData.py e [List of User Ids Who are Posting] [List of Titles] [Text List] [Tags List] [Prices] [Event Date List]")		
		elif insertType == 'e':
			tableRows = entryTable()
			insertCommand = "INSERT INTO `user_entry` (`postId`, `userId`, `title`,`text`,`eventDate`,`tags`,`price`) VALUES"
			tableName = "Entry"
			#nsertCommand = "INSERT INTO `user_entry` (`postId`, `userId`, `title`,`text`,`tags`,`price`) VALUES"

		#Write output to file
		if (insertType == 'p' or insertType == 'c' or insertType == 'v' or insertType == 'e' or insertType == 'a') and tableName!=" ":
			fileName = "output%s.txt" % (tableName)
			file=open(fileName,"w")
			file.write("%s\n" % insertCommand)
			for line in tableRows:
				file.write("%s\n" % line)
			file.close()
			print("Success! Output saved as \'%s\'" % (fileName))

main()





















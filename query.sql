CREATE TABLE [User] (
  [id] nvarchar(255) PRIMARY KEY,
  [no_induk] nvarchar(255) UNIQUE,
  [password] nvarchar(255)
)
GO

CREATE TABLE [Admin] (
  [id] nvarchar(255) PRIMARY KEY,
  [nip] nvarchar(255),
  [name] nvarchar(255)
)
GO

CREATE TABLE [Student] (
  [id] nvarchar(255) PRIMARY KEY,
  [nim] nvarchar(255),
  [prestasi_id] nvarchar(255),
  [name] nvarchar(255),
  [study_program_id] nvarchar(255),
  [major_id] nvarchar(255)
)
GO

CREATE TABLE [Lecturer] (
  [id] nvarchar(255) PRIMARY KEY,
  [nidn] nvarchar(255),
  [name] nvarchar(255)
)
GO

CREATE TABLE [Prestasi] (
  [id] nvarchar(255) PRIMARY KEY,
  [attachment_id] nvarchar(255),
  [competition_name] nvarchar(255),
  [category] nvarchar(255),
  [champion_level] nvarchar(255),
  [place] nvarchar(255),
  [start_comp_date] date,
  [end_comp_date] date,
  [competition_source] nvarchar(255),
  [total_college_attended] int,
  [total_participant] int,
  [supervisor_id] nvarchar(255),
  [isValidate] tinyint
)
GO

CREATE TABLE [Prestasi_team] (
  [id] nvarchar(255) PRIMARY KEY,
  [nim] nvarchar(255),
  [prestasi_id] nvarchar(255),
  [is_leader] tinyint,
  [is_member] tinyint,
  [supervisor_id] nvarchar(255)
)
GO

CREATE TABLE [Loa] (
  [id] nvarchar(255) PRIMARY KEY,
  [loa_number] nvarchar(255) UNIQUE,
  [date] date,
  [loa_pdf_path] nvarchar(255)
)
GO

CREATE TABLE [Attachment] (
  [id] nvarchar(255) PRIMARY KEY,
  [loa_id] nvarchar(255),
  [certificate_path] nvarchar(255),
  [documentation_photo_path] nvarchar(255),
  [poster_path] nvarchar(255),
  [creation_path] nvarchar(255),
  [caption] text
)
GO

CREATE TABLE [Skkm] (
  [id] nvarchar(255) PRIMARY KEY,
  [id_prestasi] nvarchar(255),
  [nim] nvarchar(255),
  [certificate_number] nvarchar(255) UNIQUE,
  [activity_name] nvarchar(255),
  [level] nvarchar(255),
  [certificate_path] nvarchar(255),
  [point] decimal
)
GO

CREATE TABLE [Prestasi_statistic] (
  [id] nvarchar(255) PRIMARY KEY,
  [study_program_id] nvarchar(255),
  [major_id] nvarchar(255),
  [total_victory_all] int,
  [year] int
)
GO

CREATE TABLE [Study_program] (
  [id] nvarchar(255) PRIMARY KEY,
  [major_id] nvarchar(255),
  [study_program_name] nvarchar(255),
  [total_study_program_victory] int
)
GO

CREATE TABLE [Major] (
  [id] nvarchar(255) PRIMARY KEY,
  [major_name] nvarchar(255),
  [total_major_victory] int
)
GO

CREATE TABLE [International_champ] (
  [id] nvarchar(255) PRIMARY KEY,
  [nim] nvarchar(255)
)
GO

CREATE TABLE [National_champ] (
  [id] nvarchar(255) PRIMARY KEY,
  [nim] nvarchar(255)
)
GO

CREATE TABLE [Province_champ] (
  [id] nvarchar(255) PRIMARY KEY,
  [nim] nvarchar(255)
)
GO

CREATE TABLE [Regency_champ] (
  [id] nvarchar(255) PRIMARY KEY,
  [nim] nvarchar(255)
)
GO

ALTER TABLE [Admin] ADD FOREIGN KEY ([nip]) REFERENCES [User] ([no_induk])
GO

ALTER TABLE [Student] ADD FOREIGN KEY ([nim]) REFERENCES [User] ([no_induk])
GO

ALTER TABLE [Student] ADD FOREIGN KEY ([prestasi_id]) REFERENCES [Prestasi] ([id])
GO

ALTER TABLE [Student] ADD FOREIGN KEY ([study_program_id]) REFERENCES [Study_program] ([id])
GO

ALTER TABLE [Student] ADD FOREIGN KEY ([major_id]) REFERENCES [Major] ([id])
GO

ALTER TABLE [Lecturer] ADD FOREIGN KEY ([nidn]) REFERENCES [User] ([no_induk])
GO

ALTER TABLE [Prestasi] ADD FOREIGN KEY ([attachment_id]) REFERENCES [Attachment] ([id])
GO

ALTER TABLE [Prestasi] ADD FOREIGN KEY ([supervisor_id]) REFERENCES [Lecturer] ([nidn])
GO

ALTER TABLE [Prestasi_team] ADD FOREIGN KEY ([nim]) REFERENCES [Student] ([nim])
GO

ALTER TABLE [Prestasi_team] ADD FOREIGN KEY ([prestasi_id]) REFERENCES [Prestasi] ([id])
GO

ALTER TABLE [Prestasi_team] ADD FOREIGN KEY ([supervisor_id]) REFERENCES [Lecturer] ([nidn])
GO

ALTER TABLE [Attachment] ADD FOREIGN KEY ([loa_id]) REFERENCES [Loa] ([loa_number])
GO

ALTER TABLE [Skkm] ADD FOREIGN KEY ([id_prestasi]) REFERENCES [Prestasi] ([id])
GO

ALTER TABLE [Skkm] ADD FOREIGN KEY ([nim]) REFERENCES [Student] ([nim])
GO

ALTER TABLE [Prestasi_statistic] ADD FOREIGN KEY ([study_program_id]) REFERENCES [Study_program] ([id])
GO

ALTER TABLE [Prestasi_statistic] ADD FOREIGN KEY ([major_id]) REFERENCES [Major] ([id])
GO

ALTER TABLE [Study_program] ADD FOREIGN KEY ([major_id]) REFERENCES [Major] ([id])
GO

ALTER TABLE [International_champ] ADD FOREIGN KEY ([nim]) REFERENCES [Student] ([nim])
GO

ALTER TABLE [National_champ] ADD FOREIGN KEY ([nim]) REFERENCES [Student] ([nim])
GO

ALTER TABLE [Province_champ] ADD FOREIGN KEY ([nim]) REFERENCES [Student] ([nim])
GO

ALTER TABLE [Regency_champ] ADD FOREIGN KEY ([nim]) REFERENCES [Student] ([nim])
GO
